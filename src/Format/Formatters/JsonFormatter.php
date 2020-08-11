<?php

namespace Y\Format\Formatters;

final class JsonFormatter implements IFormatter
{
    /** @var int */
    protected $options;

    /** @var int */
    protected $depth;

    /**
     * JsonFormatter constructor.
     *
     * @param int $options
     * @param int $depth
     */
    public function __construct($options = 0, $depth = 512)
    {
        $this->options = $options;
        $this->depth = $depth;
    }

    /**
     * @param array $data
     *
     * @return string
     */
    public function format($data)
    {
        return json_encode($data, $this->options, $this->depth) . "\r\n";
    }
}