<?php

namespace Y\Storage;

use Y\Storage\Repositories\IRepository;

class AbstractStorage
{
    /** @var IRepository */
    protected $repository;

    /**
     * @return IRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * @param array $data
     *
     * @return void
     */
    public function save($data)
    {
        return $this->repository->save($data);
    }
}