<?php

namespace RValidate;

use RValidate\Interfaces\Filter;

class Sub
{
    protected $filter;
    protected $pattern;

    /**
     * @param Filter $filter
     * @param \RValidate\Pattern $pattern
     */
    public function __construct(Filter $filter, Pattern $pattern)
    {
        $this->filter  = $filter;
        $this->pattern = $pattern;
    }

    /**
     * @return Filter
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * @return Pattern
     */
    public function getPattern()
    {
        return $this->pattern;
    }
}