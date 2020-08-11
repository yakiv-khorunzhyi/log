<?php

namespace Y\Format\Formatters;

interface IFormatter
{
    /**
     * @param array $arr
     *
     * @return string
     */
    public function format($arr);
}