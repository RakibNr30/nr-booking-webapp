<?php

namespace Modules\Ums\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Modules\Ums\Http\Requests\UserResidentialInfoUpdateRequest;
use Modules\Ums\Services\UserResidentialInfoService;

class ResidentialInfoController extends Controller
{
    /**
     * @var $userResidentialInfoService
     */
    protected $userResidentialInfoService;

    /**
     * Constructor
     *
     * @param UserResidentialInfoService $userResidentialInfoService
     */
    public function __construct(UserResidentialInfoService $userResidentialInfoService)
    {
        $this->userResidentialInfoService = $userResidentialInfoService;
    }

    /**
     * UserPersonalInfo list
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // first or create user residential info
        $userResidentialInfo = $this->userResidentialInfoService->firstOrCreate([
            'user_id' => auth()->user()->id
        ]);
        // return view
        return view('ums::profile.residential_info.index', compact('userResidentialInfo'));
    }

    /**
     * Store userResidentialInfo
     *
     * @param UserResidentialInfoUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserResidentialInfoUpdateRequest $request, $id)
    {
        // create userResidentialInfo
        $userResidentialInfo = $this->userResidentialInfoService->update($request->all(), $id);
        // check if userResidentialInfo created
        if ($userResidentialInfo) {
            // flash notification
            notifier()->success('Your residential info updated successfully.');
        } else {
            // flash notification
            notifier()->error('Your residential info cannot be updated successfully.');
        }
        // redirect back
        return redirect()->back();
    }
}
