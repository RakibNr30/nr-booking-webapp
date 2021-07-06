<?php

namespace Modules\Ums\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Modules\Ums\Http\Requests\UserPersonalInfoUpdateRequest;
use Modules\Ums\Services\UserPersonalInfoService;

class PersonalInfoController extends Controller
{
    /**
     * @var $userPersonalInfoService
     */
    protected $userPersonalInfoService;

    /**
     * Constructor
     *
     * @param UserPersonalInfoService $userPersonalInfoService
     */
    public function __construct(UserPersonalInfoService $userPersonalInfoService)
    {
        $this->userPersonalInfoService = $userPersonalInfoService;
    }

    /**
     * UserPersonalInfo list
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // first or create user personal info
        $userPersonalInfo = $this->userPersonalInfoService->firstOrCreate([
            'user_id' => auth()->user()->id
        ]);
        // return view
        return view('ums::profile.personal_info.index', compact('userPersonalInfo'));
    }

    /**
     * Store userPersonalInfo
     *
     * @param UserPersonalInfoUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserPersonalInfoUpdateRequest $request, $id)
    {
        // create userPersonalInfo
        $userPersonalInfo = $this->userPersonalInfoService->update($request->all(), $id);
        // check if userPersonalInfo created
        if ($userPersonalInfo) {
            // flash notification
            notifier()->success('Your personal info updated successfully.');
        } else {
            // flash notification
            notifier()->error('Your personal info cannot be updated successfully.');
        }
        // redirect back
        return redirect()->back();
    }
}
