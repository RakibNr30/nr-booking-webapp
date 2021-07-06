<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Modules\Cms\Entities\Donation;
use Modules\Cms\Services\CasesService;
use Modules\Cms\Services\DonationService;
use Modules\Setting\Services\ApiService;
use Srmklive\PayPal\Services\ExpressCheckout;

class PayPalPaymentController extends Controller
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

    public function handlePayment(Request $request)
    {
        $apiCredentials = $this->apiService->firstOrCreate([]);
        $config = [
            'mode'    => env('PAYPAL_MODE', 'sandbox'),
            'sandbox' => [
                'username'    => $apiCredentials->sandbox_username ?? '',
                'password'    => $apiCredentials->sandbox_password ?? '',
                'secret'      => $apiCredentials->sandbox_secret ?? '',
                'certificate' => $apiCredentials->sandbox_certificate ?? '',
                'app_id'      => $apiCredentials->sandbox_app_id ?? '',
            ],
            'payment_action' => 'Sale',
            'currency'       => $apiCredentials->currency ?? 'EUR',
            'billing_type'   => 'MerchantInitiatedBilling',
            'notify_url'     => '',
            'locale'         => '',
            'validate_ssl'   => true,
        ];

        $data = $request->all();
        $request->session()->put('requested', $data);

        $product = [];
        $product['items'] = [
            [
                'name' => 'Donation',
                'price' => $data['donate_amount'],
                'desc'  => 'Donation for homeless',
                'qty' => 1
            ]
        ];

        $product['invoice_id'] = time();
        $product['invoice_description'] = "Donate #{$product['invoice_id']} Bill";
        $product['return_url'] = route('success.payment');
        $product['cancel_url'] = route('cancel.payment');
        $product['total'] = $product['items'][0]['price'] * $product['items'][0]['qty'];

        $provider = new ExpressCheckout;

        try {
            $provider->setApiCredentials($config);
        } catch (\Exception $e) {}

        try {
            $res = $provider->setExpressCheckout($product);
        } catch (\Exception $e) {}

        try {
            $res = $provider->setExpressCheckout($product, true);
        } catch (\Exception $e) {}

        if ($res['ACK'] == 'Success')
        {
            return redirect($res['paypal_link']);
        }

        // flash notification
        notifier()->error('Your donation was not success due to technical issue');
        return redirect()->back();
    }

    public function paymentCancel()
    {
        // flash notification
        notifier()->error('Your donation process has been declined');
        return redirect()->route('front.donate.index');
    }

    public function paymentSuccess(Request $request)
    {
        $provider = new ExpressCheckout;
        try {
            $response = $provider->getExpressCheckoutDetails($request->token);
        } catch (\Exception $e) {}

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            $data = $request->session()->get('requested');
            $data['donner_id'] = auth()->user()->id;
            $data['token'] = $request->get('token');

            // if PayerID exists
            if ($request->has('PayerID')) {
                $data['payer_id'] = $request->get('PayerID');
            }
            // update or create donation
            Donation::updateOrCreate([
                'token' => $data['token']
            ], $data);

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
