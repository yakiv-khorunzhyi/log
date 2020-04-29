<?php

namespace Y\LogTypes;

use Y\Formatters\FileFormatter;
use Y\LogLevel;

use function Y\Helpers\createDirIfNotExists;

/**
 * Class FileLog
 * @package Y\Logs
 */
class FileLog extends AbstractLog
{
    /**
     * @param $log
     * @param string $level
     *
     * @return void
     * @throws \InvalidArgumentException
     */
    public function write($log, string $level = LogLevel::ERROR): void
    {
        $path = pathinfo($this->path);
        $date = date('Y_m_d');

        $fullPath = "{$path['dirname']}/{$date}_{$level}_{$path['basename']}";
        createDirIfNotExists($path['dirname']);

        $formatter = new FileFormatter();
        $logStr = $formatter->format($log);

        file_put_contents($fullPath, $logStr, FILE_APPEND | LOCK_EX);
    }
}