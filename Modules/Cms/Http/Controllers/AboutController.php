<?php

namespace Modules\Cms\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Cms\Http\Requests\AboutUpdateRequest;
use Modules\Cms\Services\AboutService;

class AboutController extends Controller
{
    /**
     * @var $aboutService
     */
    protected $aboutService;

    /**
     * Constructor
     *
     * @param AboutService $aboutService
     */
    public function __construct(AboutService $aboutService)
    {
        $this->aboutService = $aboutService;
    }

    /**
     * About list
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $about = $this->aboutService->firstOrCreate([]);
        return view('cms::about.index', compact('about'));
    }

    /**
     * Update about
     *
     * @param AboutUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AboutUpdateRequest $request, $id)
    {
        // get about
        $about = $this->aboutService->find($id);
        // check if about doesn't exists
        if (empty($about)) {
            // flash notification
            notifier()->error('About not found!');
            // redirect back
            return redirect()->back();
        }
        // update about
        $about = $this->aboutService->update($request->all(), $id);
        // check if about updated
        if ($about) {
            // flash notification
            notifier()->success('About updated successfully.');
        } else {
            // flash notification
            notifier()->error('About cannot be updated successfully.');
        }
        // redirect back
        return redirect()->back();
    }
}
