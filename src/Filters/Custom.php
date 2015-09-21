<?php

namespace RValidate\Filters;

use RValidate\Interfaces;

class Custom implements Interfaces\Filter
{
    private $func;
    private $flag;
    
    public function __construct($func, $flag = ARRAY_FILTER_USE_BOTH)
    {
        $this->func = $func;
        $this->flag = $flag;
    }
    
    public function filter($data)
    {
        if (!is_array($data)) {
            return [];
        }
        
        return array_filter($data, $this->func, $this->flag);
    }
}