<?php

namespace Modules\Cms\Services;

use Modules\Ums\Repositories\UserRepository;

class DashboardService
{
    protected $userRepository;

    public function __construct
    (
        UserRepository $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }

    public function counter() {
        // counter object
        $counter = new \stdClass();

        // total athlete
        $counter->totalAdmin = $this->userRepository->model
            ->whereHas('roles', function ($query) {
                $query->where('name', 'Admin');
            })->count();


        return $counter;
    }
}
