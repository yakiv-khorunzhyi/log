<?php

namespace Y\Format\Formatters;

final class FileFormatter implements IFormatter
{
    /** @var string */
    protected $elementSeparator;

    /** @var string */
    protected $elementBreak;

    /** @var string */
    protected $lineBreak;

    /**
     * FileFormatter constructor.
     *
     * @param string $elementSeparator
     * @param string $elementBreak
     * @param string $lineBreak
     */
    public function __construct($elementSeparator, $elementBreak, $lineBreak)
    {
        $this->elementSeparator = $elementSeparator;
        $this->elementBreak = $elementBreak;
        $this->lineBreak = "\n{$lineBreak}";
    }

    /**
     * @param array $data
     *
     * @return string
     */
    public function format($data)
    {
        $str = '';

        foreach ($data as $key => &$val) {
            if (is_string($key)) {
                $str .= "{$key}:{$val}{$this->elementSeparator}{$this->elementBreak}";
            } else {
                $str .= "{$val}{$this->elementSeparator}{$this->elementBreak}";
            }
        }

        $str = $this->dropLastElementSeparator(
            $str,
            strlen($this->elementSeparator) + strlen($this->elementBreak)
        );

        return $str . $this->lineBreak;
    }

    /**
     * @param string $str
     * @param int $count
     *
     * @return false|string
     */
    private function dropLastElementSeparator($str, $count)
    {
        return substr($str, 0, -$count);
    }
}