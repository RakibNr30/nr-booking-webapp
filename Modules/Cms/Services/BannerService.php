<?php

namespace Modules\Cms\Services;

use Modules\Cms\Repositories\BannerRepository;

class BannerService
{
    /**
     * @var $bannerRepository
     */
    protected $bannerRepository;

    /**
     * Constructor
     *
     * @param BannerRepository $bannerRepository
     */
    public function __construct(BannerRepository $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
    }

    /**
     * Get all data
     *
     * @param int $limit
     * @return mixed
     */
    public function all($limit = 0)
    {
        return $this->bannerRepository->paginate($limit);
    }

    /**
     * Get all data
     *
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        return $this->bannerRepository->create($data);
    }

    /**
     * Find data
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->bannerRepository->find($id);
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
        return $this->bannerRepository->update($data, $id);
    }

    /**
     * Delete data
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->bannerRepository->delete($id);
    }

    /**
     * First or create
     *
     * @param $data
     * @return mixed
     */
    public function firstOrCreate($data)
    {
        return $this->bannerRepository->model->firstOrCreate($data);
    }
}
