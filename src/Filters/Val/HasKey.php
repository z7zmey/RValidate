<?php

namespace RValidate\Filters\Val;

use RValidate\Interfaces;

class HasKey implements Interfaces\Filter
{
    private $key;
    private $equal;
    
    public function __construct($key, $equal)
    {
        $this->key = $key;
        $this->equal = $equal;
    }
    
    public function filter($data) : array
    {
        if (!is_array($data)) {
            return [];
        }
        
        return array_filter($data, array($this, 'filterFunc'));
    }
    
    private function filterFunc($val)
    {
        return is_array($val) && array_key_exists($this->key, $val) && $val[$this->key] === $this->equal;
    }
}