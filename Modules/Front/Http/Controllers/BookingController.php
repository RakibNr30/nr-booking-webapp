<?php

namespace Modules\Front\Http\Controllers;

use App\Exports\SingleBookingExport;
use App\Http\Controllers\Controller;
use Dompdf\Exception;
use Illuminate\Http\Request;
use Modules\Cms\Services\BookingService;
use Modules\Cms\Services\HotelService;

class BookingController extends Controller
{
    protected $bookingService;
    protected $hotelService;


    public function __construct(BookingService $bookingService, HotelService $hotelService)
    {
        $this->bookingService = $bookingService;
        $this->hotelService = $hotelService;
    }

    public function store(Request $request)
    {
        // all request
        $data = $request->all();

        // create hotel
        $booking = $this->bookingService->create($data);
        // check if booking created
        if ($booking) {
            // flash notification
            notifier()->success('Booking placed successfully. We\'ll contact with you very soon.');
        } else {
            // flash notification
            notifier()->error('Booking cannot be placed successfully.');
        }

        $time = time();

        try {
            \Maatwebsite\Excel\Facades\Excel::store(new SingleBookingExport($booking->id), "{$booking->email}-{$time}.xlsx", 'excel_upload');
        } catch (Exception $e) {}

        // redirect back
        return redirect()->back();
    }

}
