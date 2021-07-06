<?php

namespace Modules\Front\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Cms\Services\PrivacyPolicyService;

class PrivacyPolicyController extends Controller
{
    protected $privacyPolicyService;

    public function __construct
    (
        PrivacyPolicyService $privacyPolicyService
    )
    {
        $this->privacyPolicyService = $privacyPolicyService;
    }

    public function index()
    {
        // data object
        $data = new \stdClass();

        // privacyPolicy
        $data->privacyPolicy = $this->privacyPolicyService->firstOrCreate([]);

        return view('front::' . config('core.theme') . '.privacy-policy.index', compact('data'));
    }
}
