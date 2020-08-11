<?php

namespace Y\Format;

use Y\Format\Formatters\IFormatter;

class AbstractFormat
{
    /** @var IFormatter */
    protected $formatter;

    /**
     * @return IFormatter
     */
    public function getFormatter()
    {
        return $this->formatter;
    }
}