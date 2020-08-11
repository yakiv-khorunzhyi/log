<?php

namespace Y\Helpers\Classes;

class FileHelper
{
    /**
     * @param string $path
     * @param int $mode
     *
     * @return void
     */
    public static function createDirIfNotExists($path, $mode = 0777)
    {
        if (!file_exists($path)) {
            mkdir($path, $mode);
        }
    }

    /**
     * @param string $path
     * @param string $str
     * @param int $flags
     *
     * @return void
     */
    public static function writeToFile($path, $str, $flags = FILE_APPEND | LOCK_EX)
    {
        file_put_contents($path, $str, $flags);
    }
}