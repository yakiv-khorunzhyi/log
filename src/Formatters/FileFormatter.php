<?php

namespace Y\Formatters;

/**
 * Class FileFormatter
 * @package Y\Formatters
 */
class FileFormatter extends AbstractFormatter
{
    /**
     * @param array $arr
     *
     * @return string
     */
    public function format(array $arr): string
    {
        $str = '';

        foreach ($arr as $key => &$val) {
            $str .= "{$key}:{$val}, ";
        }

        return substr($str, 0, -2) . "\r\n";
    }
}