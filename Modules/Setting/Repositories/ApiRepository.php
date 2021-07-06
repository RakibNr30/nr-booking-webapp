<?php

namespace Modules\Setting\Repositories;

use App\Repositories\BaseRepository;

class ApiRepository extends BaseRepository
{
    /**
     * Set model
     * 
     * @return string
     */
    public function model()
    {
        return 'Modules\\Setting\\Entities\\Api';
    }
}
