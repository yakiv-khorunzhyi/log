<?php

namespace Y\Storage\Repositories;

interface IRepository
{
    /**
     * @param array $data
     *
     * @return void
     */
    public function save($data);
}