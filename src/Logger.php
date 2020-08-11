<?php

namespace Y;

use Y\Enums\StorageType;
use Y\Format\Formatters\DatabaseFormatter;
use Y\Storage\Repositories\DatabaseRepository;

class Logger extends AbstractLogger
{
    /**
     * @param mixed $log
     *
     * @return void
     */
    public function log($log)
    {
        $this->checkDataType($log);

        $data = $this->formatter->getFormatter()->format([
            'level' => $this->level,
            'created_at' => date('Y-m-d H:i:s'),
            'data' => $log,
        ]);

        $this->storage->save($data);
    }

    /**
     * @param mixed $log
     */
    private function checkDataType($log)
    {
        $isDBRepository = $this->storage->getRepository() instanceof DatabaseRepository;
        $isDBFormatter = $this->formatter->getFormatter() instanceof DatabaseFormatter;

        if (($isDBRepository && !$isDBFormatter) || (!$isDBRepository && $isDBFormatter)) {
            throw new \RuntimeException(
                'Database storage is used together with database formatter.'
            );
        }

        if ($isDBRepository && !is_array($log)) {
            throw new \RuntimeException(
                'Database storage only accepts an associative array.'
            );
        }
    }
}