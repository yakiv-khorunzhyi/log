<?php

namespace Y\Formatters;

/**
 * Class AbstractFormatters
 * @package Y\Formatter\Formatters
 */
abstract class AbstractFormatter
{
    /**
     * @param array $arr
     *
     * @return string
     */
    public abstract function format(array $arr): string;
}