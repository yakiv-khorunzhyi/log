<?php

namespace Y\Format;

interface IFormat
{
    /**
     * @return void
     */
    public function database();

    /**
     * @param int $options
     * @param int $depth
     *
     * @return void
     */
    public function json($options, $depth);

    /**
     * @param string $separator
     * @param string $elementBreak
     * @param string $lineBreak
     *
     * @return void
     */
    public function string($separator, $elementBreak, $lineBreak);
}