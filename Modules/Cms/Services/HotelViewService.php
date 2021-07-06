<?php

namespace Modules\Cms\Services;

use Modules\Cms\Repositories\HotelViewRepository;

class HotelViewService
{
    /**
     * @var $hotelViewRepository
     */
    protected $hotelViewRepository;

    /**
     * Constructor
     *
     * @param HotelViewRepository $hotelViewRepository
     */
    public function __construct(HotelViewRepository $hotelViewRepository)
    {
        $this->hotelViewRepository = $hotelViewRepository;
    }

    /**
     * Get all data
     *
     * @param int $limit
     * @return mixed
     */
    public function all($limit = 0)
    {
        return $this->hotelViewRepository->paginate($limit);
    }

    /**
     * Get all data
     *
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        return $this->hotelViewRepository->create($data);
    }

    /**
     * Find data
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->hotelViewRepository->find($id);
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
        return $this->hotelViewRepository->update($data, $id);
    }

    /**
     * Delete data
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->hotelViewRepository->delete($id);
    }

    /**
     * Delete data
     *
     * @param $id
     * @return mixed
     */
    public function isUniqueView($id)
    {
        $ip = request()->ip();

        $value = $this->hotelViewRepository->model->where([
            ['hotel_id' , $id],
            ['remote_ip', $ip]
        ])->first();

        if (empty($value)) {
            $this->hotelViewRepository->create([
                'hotel_id' => $id,
                'remote_ip' => $ip
            ]);

            return true;
        }

        return false;
    }
}
