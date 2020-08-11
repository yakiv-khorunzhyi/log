<?php

namespace Y\Storage\Repositories;

use Y\Helpers\Classes\FileHelper;

final class FileRepository implements IRepository
{
    /** @var string */
    protected $dirName;

    /** @var string */
    protected $baseName;

    /**
     * FileStorage constructor.
     *
     * @param $path
     */
    public function __construct($path)
    {
        $this->dirName = dirname($path);
        $this->baseName = basename($path);
    }

    /**
     * @param string $log
     */
    public function save($log)
    {
        $date = date('Y_m_d');
        $fullPath = "{$this->dirName}/{$date}_{$this->baseName}";
        FileHelper::writeToFile($fullPath, $log);
    }
}