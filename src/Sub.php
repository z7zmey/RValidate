<?php

namespace RValidate;

use RValidate\Interfaces\Filter;

class Sub
{
    protected $filter;
    protected $pattern;

    /**
     * @param Filter $filter
     * @param array $pattern
     */
    public function __construct(Filter $filter, array $pattern)
    {
        $this->filter  = $filter;
        $this->pattern = $pattern;
    }

    /**
     * @return Filter
     */
    public function getFilter() : Filter
    {
        return $this->filter;
    }

    /**
     * @return array
     */
    public function getPattern() : array
    {
        return $this->pattern;
    }
}