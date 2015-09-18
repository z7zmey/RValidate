<?php

namespace RValidate\Iterators;

use RValidate\Interfaces;
use RValidate\Filters\Equal;

class Pattern extends AbstractIterator
{
    protected $filter;
    
    public function __construct(...$rules)
    {
        $this->storage = array_merge($this->storage, $rules);
    }

    public static function filter(Interfaces\Filter $filter, Pattern $proto = null)
    {
        if ($proto) {
            $instance = clone($proto);
        } else {
            $instance = new self();
        }
        return $instance->setFilter($filter);
    }

    public static function get($key, Pattern $proto = null)
    {
        return self::filter(new Equal($key), $proto);
    }
    
    protected function setFilter(Interfaces\Filter $filter = null)
    {
        $this->filter = $filter;
        return $this;
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