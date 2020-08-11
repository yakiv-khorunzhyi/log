<?php

namespace Y\Storage;

interface IStorage
{
    /**
     * @param \PDO $pdo
     * @param string $table
     *
     * @return void
     */
    public function database($pdo, $table);

    /**
     * @param string $path
     *
     * @return void
     */
    public function file($path);
}