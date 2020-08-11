<?php

namespace Y\Format;

use Y\Format\Formatters\DatabaseFormatter;
use Y\Format\Formatters\FileFormatter;
use Y\Format\Formatters\JsonFormatter;

class Format extends AbstractFormat implements IFormat
{
    /**
     * @param string $separator
     * @param string $elementBreak
     * @param string $lineBreak
     *
     * @return void
     */
    public function string($separator = ';', $elementBreak = '', $lineBreak = '')
    {
        $this->formatter = new FileFormatter($separator, $elementBreak, $lineBreak);
    }

    /**
     * @param int $options
     * @param int $depth
     *
     * @return void
     */
    public function json($options = 0, $depth = 512)
    {
        $this->formatter = new JsonFormatter($options, $depth);
    }

    /**
     * @return void
     */
    public function database()
    {
        $this->formatter = new DatabaseFormatter();
    }
}