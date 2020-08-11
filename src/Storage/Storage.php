<?php

namespace Y\Storage;

use Y\Helpers\Classes\FileHelper;
use Y\Storage\Repositories\DatabaseRepository;
use Y\Storage\Repositories\FileRepository;

class Storage extends AbstractStorage implements IStorage
{
    /**
     * @param \PDO $pdo
     * @param string $table
     *
     * @return void
     */
    public function database($pdo, $table)
    {
        $this->repository = new DatabaseRepository($pdo, $table);
    }

    /**
     * @param string $path
     *
     * @return void
     */
    public function file($path)
    {
        FileHelper::createDirIfNotExists(dirname($path));
        $this->repository = new FileRepository($path);
    }
}