<?php

namespace Modules\Front\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Cms\Services\HotelService;

class DestinationController extends Controller
{
    protected $hotelService;

    public function __construct(HotelService $hotelService)
    {
        $this->hotelService = $hotelService;
    }

    public function index()
    {
        // data object
        $data = new \stdClass();

        return view('front::' . config('core.theme') . '.destination.index', compact('data'));
    }

    public function show($slug)
    {
        // data object
        $data = new \stdClass();

        // get hotels
        $data->hotels = $this->hotelService->searchByContinent($slug, 12);
        $data->totalHotel = $this->hotelService->searchByContinentCount($slug);

        return view('front::' . config('core.theme') .'.destination.show', compact('data'));
    }
}
