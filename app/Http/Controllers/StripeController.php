<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Cms\Entities\Donation;
use Modules\Cms\Services\CasesService;
use Modules\Cms\Services\DonationService;
use Modules\Setting\Services\ApiService;
use Stripe\Charge;
use Stripe\Stripe;

class StripeController extends Controller
{
    protected $donationService;
    protected $casesService;
    protected $apiService;

    public function __construct
    (
        DonationService $donationService,
        CasesService $casesService,
        ApiService $apiService
    )
    {
        $this->donationService = $donationService;
        $this->casesService = $casesService;
        $this->apiService = $apiService;
    }

    public function stripePayment(Request $request)
    {
        $data = $request->all();

        $apiCredentials = $this->apiService->firstOrCreate([]);

        Stripe::setApiKey($apiCredentials->stripe_secret ?? '');
        $time = time();
        $charge = Charge::create ([
            "amount" => $data['donate_amount'] * 100,
            "currency" => $apiCredentials->currency ?? "EUR",
            "source" => $request->stripeToken,
            "description" => "Donate #{$time} Bill",
        ]);

        if ($charge->status == "succeeded") {
            $data['donner_id'] = auth()->user()->id;

            // update or create donation
            Donation::create($data);

            // case
            $case = $this->casesService->find($data['case_id']);
            // check if case empty
            if (!empty($case)) {
                // donate for case
                $donate = $case->donations->sum('donate_amount');
                // check if raised 100%
                if ($case->needed_money <= $donate) {
                    $this->casesService->update(['status' => 1], $case->id);
                }
            }

            // flash notification
            notifier()->success('Your donation is successful');
            return redirect()->route('front.donate.index');
        }

        // flash notification
        notifier()->error('Your donation is not success due to technical issue');
        return redirect()->route('front.donate.index');
    }
}
