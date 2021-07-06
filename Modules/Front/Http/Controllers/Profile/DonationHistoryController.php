<?php

namespace Modules\Front\Http\Controllers\Profile;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Cms\Services\DonationService;
use Modules\Ums\Services\UserService;

class DonationHistoryController extends Controller
{
    /**
     * @var $userService
     */
    protected $donationService;

    /**
     * Constructor
     *
     * @param DonationService $donationService
     */
    public function __construct(DonationService $donationService)
    {
        $this->middleware(['donner']);
        $this->donationService = $donationService;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        // data object
        $data = new \stdClass();
        // donation
        $data->donations = $this->donationService->donateByUser(auth()->user()->id);
        // return view
        return view('front::profile.donation-history.index', compact('data'));
    }
}
