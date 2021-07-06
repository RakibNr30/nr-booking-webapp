<?php

namespace Modules\Cms\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Cms\Http\Requests\BannerUpdateRequest;
use Modules\Cms\Services\BannerService;

class BannerController extends Controller
{
    /**
     * @var $bannerService
     */
    protected $bannerService;

    /**
     * Constructor
     *
     * @param BannerService $bannerService
     */
    public function __construct(BannerService $bannerService)
    {
        $this->bannerService = $bannerService;
    }

    /**
     * Banner list
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $banner = $this->bannerService->firstOrCreate([]);
        return view('cms::banner.index', compact('banner'));
    }

    /**
     * Update banner
     *
     * @param BannerUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(BannerUpdateRequest $request, $id)
    {
        // get banner
        $banner = $this->bannerService->find($id);
        // check if banner doesn't exists
        if (empty($banner)) {
            // flash notification
            notifier()->error('Banner not found!');
            // redirect back
            return redirect()->back();
        }
        // update banner
        $banner = $this->bannerService->update($request->all(), $id);
        // upload files
        $banner->uploadFiles();
        // check if banner updated
        if ($banner) {
            // flash notification
            notifier()->success('Banner updated successfully.');
        } else {
            // flash notification
            notifier()->error('Banner cannot be updated successfully.');
        }
        // redirect back
        return redirect()->back();
    }
}
