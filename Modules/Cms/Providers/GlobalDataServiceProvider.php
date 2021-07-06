<?php

namespace Modules\Cms\Providers;

use Illuminate\Support\ServiceProvider;

// services
use Modules\Cms\Services\PageService;

class GlobalDataServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    /**
     * Boot the observers.
     *
     * @param PageService $pageService
     */
    public function boot
    (
        PageService $pageService
    )
    {
        if (!app()->runningInConsole()) {
            // share pages data
            view()->share('globalPages', $pageService->all());
        }
    }
}
