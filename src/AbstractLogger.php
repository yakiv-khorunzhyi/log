<?php

namespace Y;

use Y\LogTypes\AbstractLog;
use function Y\Helpers\exceptionToStr;
use function Y\Helpers\is_exception;

/**
 * Class AbstractLogger
 * @package Y
 */
abstract class AbstractLogger
{
    /**
     * @param $log
     * @param string $level
     * @param array $context
     */
    abstract function write($log, string $level, array $context = []): void;

    /** @var AbstractLog */
    protected $instance;

    /** @var string */
    protected $path;

    /** @var string */
    protected $type;

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->instance = null;
        $this->type = $type;
    }

    /**
     * @param string $path
     *
     * @return void
     */
    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    /**
     * AbstractLogger constructor.
     *
     * @param string $path
     * @param string $type
     */
    public function __construct(string $path = '', string $type = 'file')
    {
        $this->path = $path;
        $this->type = $type;
    }

    /**
     * @return AbstractLog
     * @throws \UnexpectedValueException
     */
    protected function getInstance(): AbstractLog
    {
        if (is_null($this->instance)) {
            $this->setInstance();
        }

        return $this->instance;
    }

    /**
     * @throws \UnexpectedValueException
     */
    private function setInstance()
    {
        try {
            $fullClassName = "\Y\LogTypes\\" . ucfirst($this->type) . 'Log';

            $concreteLog = new $fullClassName();
            $concreteLog->setPath($this->path);

            $this->instance = $concreteLog;
        } catch (\Throwable $t) {
            throw new \UnexpectedValueException(
                'Unexpected value for log type. Type: ' . $this->type
            );
        }
    }

    /**
     * @param $var
     * @param $level
     *
     * @return array
     */
    protected function handleLog($var, string $level): array
    {
        switch (true) {
            case is_bool($var):
                $message = var_export($var, true);
                break;
            case is_numeric($var):
                $message = strval($var);
                break;
            case is_exception($var):
                $message = exceptionToStr($var);
                break;
            case is_array($var):
                $message = serialize($var);
                break;
            case is_object($var):
                $message = (string)$var;
                break;
            default:
                throw new \InvalidArgumentException('This type of argument is not supported.');
        }

        $message = str_replace("\n", '', $message);

        return [
            'date_time' => date('Y-m-d H:i:s'),
            'level' => $level,
            'message' => $message,
        ];
    }
}