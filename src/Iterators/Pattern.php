<?php

namespace RValidate\Iterators;

use RValidate\Interfaces;
use RValidate\Filters\Equal;

class Pattern extends AbstractIterator
{
    public function __construct(...$rules)
    {
        $this->storage = array_merge($this->storage, $rules);
    }
    
    protected $filter;

    public static function all()
    {
        return new self();
    }

    public static function filter(Interfaces\Filter $filter = null)
    {
        $instance = new self();
        $instance->setFilter($filter);

        return $instance;
    }

    public static function get($key)
    {
        return self::filter(new Equal($key));
    }
    
    public function setFilter(Interfaces\Filter $filter = null)
    {
        $this->filter = $filter;
    }

    /**
     * @return \RValidate\Interfaces\Filter
     */
    public function getFilter()
    {
        return $this->filter;
    }

    //TODO: подумать стоит ли делать потдержку php версии ниже 5.6 а может сразу писать под версию 7
    public function validate(...$rules)
    {
        $this->storage = array_merge($this->storage, $rules);
        return $this;
    }
}