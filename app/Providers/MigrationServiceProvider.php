<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Blueprint;

class MigrationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // common fields
        Blueprint::macro('commonFields', function ($softDeletes = true) {
            $this->unsignedBigInteger('sort_order')->nullable()->default(0);
            $this->boolean('lock')->nullable()->default(0);
            $this->boolean('status')->nullable()->default(0);
            $this->boolean('active')->nullable()->default(0);
            $this->unsignedBigInteger('created_by')->nullable();
            $this->unsignedBigInteger('updated_by')->nullable();
            $this->unsignedBigInteger('deleted_by')->nullable();
            $this->timestamps();
            $this->softDeletes();
        });
    }
}
