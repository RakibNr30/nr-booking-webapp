<?php

namespace Modules\Cms\Services;

use Modules\Cms\Repositories\CountryRepository;

class CountryService
{
    /**
     * @var $countryRepository
     */
    protected $countryRepository;

    /**
     * Constructor
     *
     * @param CountryRepository $countryRepository
     */
    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    /**
     * Get all data
     *
     * @param int $limit
     * @return mixed
     */
    public function all($limit = 0)
    {
        return $this->countryRepository->paginate($limit);
    }

    /**
     * Find data
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->countryRepository->find($id);
    }
}
