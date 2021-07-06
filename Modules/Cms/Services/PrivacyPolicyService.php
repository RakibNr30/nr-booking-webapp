<?php

namespace Modules\Cms\Services;

use Modules\Cms\Repositories\PrivacyPolicyRepository;

class PrivacyPolicyService
{
    /**
     * @var $privacyPolicyRepository
     */
    protected $privacyPolicyRepository;

    /**
     * Constructor
     *
     * @param PrivacyPolicyRepository $privacyPolicyRepository
     */
    public function __construct(PrivacyPolicyRepository $privacyPolicyRepository)
    {
        $this->privacyPolicyRepository = $privacyPolicyRepository;
    }

    /**
     * Get all data
     *
     * @param int $limit
     * @return mixed
     */
    public function all($limit = 0)
    {
        return $this->privacyPolicyRepository->paginate($limit);
    }

    /**
     * Get all data
     *
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        return $this->privacyPolicyRepository->create($data);
    }

    /**
     * Find data
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->privacyPolicyRepository->find($id);
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
        return $this->privacyPolicyRepository->update($data, $id);
    }

    /**
     * Delete data
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->privacyPolicyRepository->delete($id);
    }

    /**
     * First or create
     *
     * @param $data
     * @return mixed
     */
    public function firstOrCreate($data)
    {
        return $this->privacyPolicyRepository->model->firstOrCreate($data);
    }
}
