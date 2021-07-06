<?php

namespace Modules\Cms\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Cms\DataTables\HotelDataTable;
use Modules\Cms\Http\Requests\HotelStoreRequest;
use Modules\Cms\Http\Requests\HotelUpdateRequest;
use Modules\Cms\Services\HotelService;
use Spatie\MediaLibrary\Models\Media;

class HotelController extends Controller
{
    /**
     * @var $hotelService
     */
    protected $hotelService;

    /**
     * Constructor
     *
     * @param HotelService $hotelService
     */
    public function __construct(HotelService $hotelService)
    {
        $this->hotelService = $hotelService;
    }

    /**
     * Hotel list
     *
     * @param HotelDataTable $datatable
     * @return \Illuminate\View\View
     */
    public function index(HotelDataTable $datatable)
    {
        return $datatable->render('cms::hotel.index');
    }

    /**
     * Create hotel
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // return view
        return view('cms::hotel.create');
    }


    /**
     * Store hotel
     *
     * @param HotelStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(HotelStoreRequest $request)
    {
        $data = $request->all();
        $data['created_by'] = auth()->user()->id;

        // create hotel
        $hotel = $this->hotelService->create($data);
        // upload files
        $hotel->uploadFiles();

        // upload multiple files
        if($request->file('slider_images')) {
            foreach ($request->file('slider_images') as $image) {
                $hotel->addMedia($image)->toMediaCollection(config('core.media_collection.hotel.slider_images'));
            }
        }

        // check if hotel created
        if ($hotel) {
            // flash notification
            notifier()->success('Hotel added successfully.');
            return redirect()->route('backend.cms.hotel.index');
        } else {
            // flash notification
            notifier()->error('Hotel cannot be added successfully.');
        }
        // redirect back
        return redirect()->back();
    }

    /**
     * Show hotel.
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        // get hotel
        $hotel = $this->hotelService->find($id);
        // check if hotel doesn't exists
        if (empty($hotel)) {
            // flash notification
            notifier()->error('Hotel not found!');
            // redirect back
            return redirect()->back();
        }
        $hotelList = $this->hotelService->allByView(6);
        // return view
        return view('cms::hotel.show', compact('hotel', 'hotelList'));
    }

    /**
     * Show hotel.
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        // get hotel
        $hotel = $this->hotelService->find($id);
        // check if hotel doesn't exists
        if (empty($hotel)) {
            // flash notification
            notifier()->error('Hotel not found!');
            // redirect back
            return redirect()->back();
        }
        // return view
        return view('cms::hotel.edit', compact('hotel'));
    }

    /**
     * Update hotel
     *
     * @param HotelUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(HotelUpdateRequest $request, $id)
    {
        $data = $request->all();
        $data['updated_by'] = auth()->user()->id;

        // get hotel
        $hotel = $this->hotelService->find($id);
        // check if hotel doesn't exists
        if (empty($hotel)) {
            // flash notification
            notifier()->error('Hotel not found!');
            // redirect back
            return redirect()->back();
        }
        // update hotel
        $hotel = $this->hotelService->update($data, $id);
        // upload files
        $hotel->uploadFiles();

        // upload multiple files
        if($request->file('slider_images')) {
            foreach ($request->file('slider_images') as $image) {
                $hotel->addMedia($image)->toMediaCollection(config('core.media_collection.hotel.slider_images'));
            }
        }

        // check if hotel updated
        if ($hotel) {
            // flash notification
            notifier()->success('Hotel updated successfully.');
        } else {
            // flash notification
            notifier()->error('Hotel cannot be updated successfully.');
        }
        // redirect back
        return redirect()->back();
    }

    /**
     * Delete hotel
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // get hotel
        $hotel = $this->hotelService->find($id);
        // check if hotel doesn't exists
        if (empty($hotel)) {
            // flash notification
            notifier()->error('Hotel not found!');
            // redirect back
            return redirect()->back();
        }
        // delete hotel
        if ($this->hotelService->delete($id)) {
            // flash notification
            notifier()->success('Hotel deleted successfully.');
        } else {
            // flash notification
            notifier()->success('Hotel cannot be deleted successfully.');
        }
        // redirect back
        return redirect()->back();
    }

    public function status(Request $request) {
        $id = $request->get('id');

        // get hotel
        $hotel = $this->hotelService->find($id);

        // update hotel
        $hotel = $this->hotelService->update(['is_open' => !$hotel->is_open], $id);

        if ($hotel) {
            return response()->json(['status' => 'success']);
        }

        return response()->json(['status' => 'error']);
    }

    /**
     * Delete hotel
     *
     * @param $image
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeImage($image)
    {
        $media = Media::find($image)->delete();

        if ($media) {
            notifier()->success('Image deleted successfully');
        } else {
            notifier()->error('Image not found!');
        }

        // redirect back
        return redirect()->back();
    }
}
