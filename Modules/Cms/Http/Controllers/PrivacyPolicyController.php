<?php

namespace Modules\Cms\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Cms\Http\Requests\PrivacyPolicyUpdateRequest;
use Modules\Cms\Services\PrivacyPolicyService;

class PrivacyPolicyController extends Controller
{
    /**
     * @var $privacyPolicyService
     */
    protected $privacyPolicyService;

    /**
     * Constructor
     *
     * @param PrivacyPolicyService $privacyPolicyService
     */
    public function __construct(PrivacyPolicyService $privacyPolicyService)
    {
        $this->privacyPolicyService = $privacyPolicyService;
    }

    /**
     * PrivacyPolicy list
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $privacyPolicy = $this->privacyPolicyService->firstOrCreate([]);
        return view('cms::privacy-policy.index', compact('privacyPolicy'));
    }

    /**
     * Update privacyPolicy
     *
     * @param PrivacyPolicyUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PrivacyPolicyUpdateRequest $request, $id)
    {
        // get privacyPolicy
        $privacyPolicy = $this->privacyPolicyService->find($id);
        // check if privacyPolicy doesn't exists
        if (empty($privacyPolicy)) {
            // flash notification
            notifier()->error('Privacy policy not found!');
            // redirect back
            return redirect()->back();
        }
        // update privacyPolicy
        $privacyPolicy = $this->privacyPolicyService->update($request->all(), $id);
        // check if privacyPolicy updated
        if ($privacyPolicy) {
            // flash notification
            notifier()->success('Privacy policy updated successfully.');
        } else {
            // flash notification
            notifier()->error('Privacy policy cannot be updated successfully.');
        }
        // redirect back
        return redirect()->back();
    }
}
