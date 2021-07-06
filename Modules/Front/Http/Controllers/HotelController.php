<?php

namespace Modules\Front\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Cms\Services\HotelService;
use Modules\Cms\Services\HotelViewService;

class HotelController extends Controller
{
    protected $hotelService;
    protected $hotelViewService;

    public function __construct(HotelService $hotelService, HotelViewService $hotelViewService)
    {
        $this->hotelService = $hotelService;
        $this->hotelViewService = $hotelViewService;
    }


    public function search(Request $request)
    {
        // data object
        $data = new \stdClass();
        // initialize
        $data->hotels = [];
        $data->totalHotel = 0;
        $data->totalNight = 0;

        if ($request->has('location') && $request->has('check_time')) {
            $location = $request->get('location');
            $times = $request->get('check_time');

            // get data
            $data->hotels = $this->hotelService->searchByLocation($location, 10);
            $data->totalHotel = $this->hotelService->searchByLocationCount($location);
            $data->totalNight = $this->hotelService->totalNightCount($times);
        }

        return view('front::' . config('core.theme') .'.hotel.index', compact('data'));
    }

    public function show($slug)
    {
        // data object
        $data = new \stdClass();

        // get data
        $data->hotel = $this->hotelService->findBy('slug', $slug);

        $data->totalNight = 1;

        if (\request()->has('times')) {
            $data->totalNight = $this->hotelService->totalNightCount(\request()->get('times'));
        }

        if (empty($data->hotel)) {
            abort(404);
        }

        if ($this->hotelViewService->isUniqueView($data->hotel->id)) {
            $this->hotelService->update(['view' => $data->hotel->view + 1], $data->hotel->id);
        }

        return view('front::' . config('core.theme') .'.hotel.show', compact('data'));
    }

    public function booking($slug)
    {
        // data object
        $data = new \stdClass();

        $data->totalNight = 1;

        if (\request()->has('times')) {
            $data->totalNight = $this->hotelService->totalNightCount(\request()->get('times'));
        }

        // get data
        $data->hotel = $this->hotelService->findBy('slug', $slug);

        if (empty($data->hotel)) {
            abort(404);
        }

        if ($this->hotelViewService->isUniqueView($data->hotel->id)) {
            $this->hotelService->update(['view' => $data->hotel->view + 1], $data->hotel->id);
        }

        return view('front::' . config('core.theme') .'.hotel.booking', compact('data'));
    }
}
