<?php

namespace Modules\Front\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Cms\Services\BannerService;
use Modules\Front\Services\HomeService;

class HomeController extends Controller
{
    protected $homeService;
    protected $bannerService;

    public function __construct(HomeService $homeService, BannerService $bannerService)
    {
        $this->homeService = $homeService;
        $this->bannerService = $bannerService;
    }

    public function index()
    {
        // data object
        $data = new \stdClass();

        // get hotels
        $data->hotels = $this->homeService->topViewed(6);
        // get about
        $data->about = $this->homeService->aboutUs([]);
        // get banner
        $data->banner = $this->homeService->banner([]);

        return view('front::' . config('core.theme') .'.home.index', compact('data'));
    }
}
