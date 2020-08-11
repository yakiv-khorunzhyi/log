<?php

namespace Y;

use Y\Format\AbstractFormat;
use Y\Format\IFormat;
use Y\Storage\IStorage;
use Y\Format\Format;
use Y\Storage\Storage;

abstract class AbstractLogger
{
    /**
     * @param $log
     *
     * @return void
     */
    abstract function log($log);

    /** @var Storage */
    protected $storage;

    /** @var AbstractFormat */
    protected $formatter;

    /** @var string */
    protected $level;

    /**
     * AbstractLogger constructor.
     */
    public function __construct()
    {
        $this->level = LogLevel::ERROR;
    }

    /**
     * @param string $level
     *
     * @return void
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * @return IStorage
     */
    public function setStorage()
    {
        return ($this->storage = new Storage());
    }

    /**
     * @return IFormat
     */
    public function setFormatter()
    {
        return ($this->formatter = new Format());
    }
}