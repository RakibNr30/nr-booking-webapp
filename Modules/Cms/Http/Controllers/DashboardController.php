<?php

namespace Modules\Cms\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Cms\Services\DashboardService;

class DashboardController extends Controller
{
    protected $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function index()
    {
        // data object
        $data = new \stdClass();

        // counter
        $data->counter = $this->dashboardService->counter();

        return view('cms::dashboard.index', compact('data'));
    }
}
