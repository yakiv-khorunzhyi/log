<?php

namespace Y;

/**
 * Class Log
 * @package Y
 */
class Logger extends AbstractLogger
{
    /**
     * @param $log
     * @param string $level
     * @param array $context
     */
    public function write($log, string $level = LogLevel::ERROR, array $context = []): void
    {
        if (is_string($log)) {
            $log = $this->interpolate($log, $context);
        } else {
            $log = $this->handleLog($log, $level);
        }

        $this->getInstance()->write($log, $level);
    }

    /**
     * @param string $message
     * @param array $context
     *
     * @return string
     */
    protected function interpolate(string $message, array $context = [])
    {
        $replace = [];

        foreach ($context as $key => &$val) {
            if (!is_array($val) && (!is_object($val) || method_exists($val, '__toString'))) {
                $replace['{' . $key . '}'] = $val;
            }
        }

        return strtr($message, $replace);
    }
}