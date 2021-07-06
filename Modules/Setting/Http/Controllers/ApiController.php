<?php

namespace Modules\Setting\Http\Controllers;

use App\Http\Controllers\Controller;

// requests...
use Modules\Setting\Http\Requests\ApiUpdateRequest;

// services...
use Modules\Setting\Services\ApiService;

class ApiController extends Controller
{
    /**
     * @var $apiService
     */
    protected $apiService;

    /**
     * Constructor
     *
     * @param ApiService $apiService
     */
    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    /**
     * Api list
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // get api data
        $api = $this->apiService->firstOrCreate([]);
        // return view
        return view('setting::api.index', compact('api'));
    }

    /**
     * Update api
     *
     * @param ApiUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ApiUpdateRequest $request, $id)
    {
        // get api
        $api = $this->apiService->find($id);
        // check if api doesn't exists
        if (empty($api)) {
            // flash notification
            notifier()->error('Api credentials not found!');
            // redirect back
            return redirect()->back();
        }
        // update api
        $api = $this->apiService->update($request->all(), $id);
        // check if api updated
        if ($api) {
            // flash notification
            notifier()->success('Api credentials updated successfully.');
        } else {
            // flash notification
            notifier()->error('Api credentials cannot be updated successfully.');
        }
        // redirect back
        return redirect()->back();
    }
}
