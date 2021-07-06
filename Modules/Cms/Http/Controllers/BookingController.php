<?php

namespace Modules\Cms\Http\Controllers;

use App\Exports\BookingsExport;
use App\Exports\SingleBookingExport;
use App\Http\Controllers\Controller;
use Modules\Cms\DataTables\BookingDataTable;
use Modules\Cms\Services\BookingService;
use Modules\Cms\Services\HotelService;

class BookingController extends Controller
{
    /**
     * @var $bookingService
     */
    protected $bookingService;
    /**
     * @var $bookingService
     */
    protected $hotelService;

    /**
     * Constructor
     *
     * @param BookingService $bookingService
     * @param HotelService $hotelService
     */
    public function __construct(BookingService $bookingService, HotelService $hotelService)
    {
        $this->bookingService = $bookingService;
        $this->hotelService = $hotelService;
    }

    /**
     * Booking list
     *
     * @param BookingDataTable $datatable
     * @return \Illuminate\View\View
     */
    public function index(BookingDataTable $datatable)
    {
        return $datatable->render('cms::booking.index');
    }

    public function create()
    {
        $time = time();

        // return view
        return (new BookingsExport())->download("booking-{$time}.xlsx");
    }

    /**
     * Show booking.
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        // get booking
        $booking = $this->bookingService->find($id);
        // check if booking doesn't exists
        if (empty($booking)) {
            // flash notification
            notifier()->error('Item not found!');
            // redirect back
            return redirect()->back();
        }

        $hotel = $this->hotelService->find($booking->hotel_id);

        // return view
        return view('cms::booking.show', compact('booking', 'hotel'));
    }

    public function export($id)
    {
        $time = time();

        // return view
        return (new SingleBookingExport($id))->download("booking-{$id}-{$time}.xlsx");
    }
}
