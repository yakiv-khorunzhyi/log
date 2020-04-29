<?php

namespace Y\LogTypes;

/**
 * Class AbstractLog
 * @package Y\Logs
 */
abstract class AbstractLog
{
    /**
     * @param $log
     * @param string $level
     */
    abstract function write($log, string $level): void;

    /** @var string */
    protected $path;

    /**
     * @param string $path
     *
     * @return void
     */
    public function setPath(string $path): void
    {
        $this->path = $path;
    }
}