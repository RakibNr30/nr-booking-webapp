<?php

namespace Modules\Setting\Services;

use Modules\Setting\Repositories\ApiRepository;

class ApiService
{
    /**
     * @var $apiRepository
     */
    protected $apiRepository;

    /**
     * Constructor
     *
     * @param ApiRepository $apiRepository
     */
    public function __construct(ApiRepository $apiRepository)
    {
        $this->apiRepository = $apiRepository;
    }

    /**
     * Get all data
     *
     * @param int $limit
     * @return mixed
     */
    public function all($limit = 0)
    {
        return $this->apiRepository->paginate($limit);
    }

    /**
     * Get all data
     *
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        return $this->apiRepository->create($data);
    }

    /**
     * Find data
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->apiRepository->find($id);
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
        return $this->apiRepository->update($data, $id);
    }

    /**
     * Delete data
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->apiRepository->delete($id);
    }

    /**
     * First or create data
     *
     * @param $data
     * @return mixed
     */
    public function firstOrCreate($data)
    {
        return $this->apiRepository->model->firstOrCreate($data);
    }

    /**
     * First data
     *
     * @return mixed
     */
    public function first()
    {
        return $this->apiRepository->model->first();
    }
}
