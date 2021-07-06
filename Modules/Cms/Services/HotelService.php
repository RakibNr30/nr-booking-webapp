<?php

namespace Modules\Cms\Services;

use Faker\Provider\DateTime;
use Illuminate\Support\Facades\Date;
use Modules\Cms\Repositories\HotelRepository;

class HotelService
{
    /**
     * @var $hotelRepository
     */
    protected $hotelRepository;

    /**
     * Constructor
     *
     * @param HotelRepository $hotelRepository
     */
    public function __construct(HotelRepository $hotelRepository)
    {
        $this->hotelRepository = $hotelRepository;
    }

    /**
     * Get all data
     *
     * @param int $limit
     * @return mixed
     */
    public function all($limit = 0)
    {
        return $this->hotelRepository->paginate($limit);
    }

    /**
     * Get all data
     *
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        return $this->hotelRepository->create($data);
    }

    /**
     * Find data
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->hotelRepository->find($id);
    }

    /**
     * Update data
     *
     * @param $data
     * @param $id
     * @return mixed
     */
    public function update($data, $id)
    {
        return $this->hotelRepository->update($data, $id);
    }

    /**
     * Delete data
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->hotelRepository->delete($id);
    }

    /**
     * Delete data
     *
     * @param int $limit
     * @return mixed
     */
    public function allByView($limit = 0)
    {
        return $this->hotelRepository->model
            ->orderByDesc('view')
            ->orderByDesc('is_open')
            ->paginate($limit);
    }

    /**
     * Search data
     *
     * @param $location
     * @param int $limit
     * @return mixed
     */
    public function searchByLocation($location, $limit = 0)
    {
        return $this->hotelRepository->model
            ->where([
                ['location', 'LIKE', "%{$location}%"]
            ])
            ->orderByDesc('is_open')
            ->paginate($limit);
    }

    /**
     * Search data
     *
     * @param $slug
     * @param int $limit
     * @return mixed
     */
    public function searchByContinent($slug, $limit = 0)
    {
        return $this->hotelRepository->model
            ->where([
                ['continent', $slug]
            ])
            ->orderByDesc('is_open')
            ->paginate($limit);
    }

    /**
     * Search data
     *
     * @param $location
     * @return mixed
     */
    public function searchByLocationCount($location)
    {
        return $this->hotelRepository->model
            ->where('location', 'LIKE', "%{$location}%")
            ->count();
    }

    /**
     * Search data
     *
     * @param $slug
     * @return mixed
     */
    public function searchByContinentCount($slug)
    {
        return $this->hotelRepository->model
            ->where('continent', $slug)
            ->count();
    }

    /**
     * Count night
     *
     * @param $times
     * @return mixed
     */
    public function totalNightCount($times)
    {
        if (!strpos($times, ' - ')) {
            abort(404);
        }

        $times = array_map('strval', explode(' - ', $times));

        $from = \DateTime::createFromFormat('m/d/Y', $times[0]) !== FALSE;
        $to = \DateTime::createFromFormat('m/d/Y', $times[1]) !== FALSE;

        if (!($from && $to)) {
            abort(404);
        }

        $from = \DateTime::createFromFormat('m/d/Y', $times[0]);
        $to = \DateTime::createFromFormat('m/d/Y', $times[1]);

        return $from->diff($to)->days;
    }


    /**
     * Delete data
     *
     * @param $attribute
     * @param $value
     * @return mixed
     */
    public function findBy($attribute, $value)
    {
        return $this->hotelRepository->findBy($attribute, $value);
    }
}
