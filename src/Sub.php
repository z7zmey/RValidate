<?php

namespace RValidate;

use RValidate\Interfaces\Filter;

class Sub
{
    protected $filter;
    protected $pattern;

    /**
     * @param Filter|int|float|string $filter
     * @param mixed $pattern
     * @throws Exceptions\Exception
     */
    public function __construct($filter, $pattern)
    {
        if ($filter instanceof Filter) {
            $this->filter  = $filter;
        } else if (is_scalar($filter)) {
            $this->filter = new Filters\Key\Equal($filter);
        } else {
            throw new Exceptions\Exception('Wrong Filter');
        }

        $this->pattern = $pattern;
        if (!is_array($pattern)) {
            $this->pattern = [$pattern];
        }
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