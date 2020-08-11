<?php

namespace Y\Helpers\Classes;

class StringHelper
{
    /**
     * @param string $message
     * @param array $context
     *
     * @return string
     */
    public static function interpolate($message, $context = [])
    {
        $replace = [];

        foreach ($context as $key => &$val) {
            $notArray = !is_array($val);
            $notObjOrHasToString = !is_object($val) || method_exists($val, '__toString');

            if ($notArray && $notObjOrHasToString) {
                $replace["{{$key}}"] = $val;
            }
        }

        return strtr($message, $replace);
    }
}