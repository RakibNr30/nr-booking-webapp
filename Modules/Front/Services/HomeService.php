<?php

namespace Modules\Front\Services;

use Modules\Cms\Services\AboutService;
use Modules\Cms\Services\BannerService;
use Modules\Cms\Services\HotelService;

class HomeService
{
    protected $hotelService;
    protected $aboutService;
    protected $bannerService;

    public function __construct
    (
        HotelService $hotelService,
        AboutService $aboutService,
        BannerService $bannerService
    )
    {
        $this->hotelService = $hotelService;
        $this->aboutService = $aboutService;
        $this->bannerService = $bannerService;
    }

    public function topViewed($limit = 0) {
        return $this->hotelService->allByView($limit);
    }

    public function aboutUs($data) {
        return $this->aboutService->firstOrCreate($data);
    }

    public function banner($data) {
        return $this->bannerService->firstOrCreate($data);
    }
}
