<?php

namespace RValidate\Filters\Key;

use RValidate\Interfaces;

class Regex implements Interfaces\Filter
{
    private $pattern;
    
    public function __construct($pattern)
    {
        $this->pattern = $pattern;
    }
    
    public function filter($data) : array
    {
        if (!is_array($data)) {
            return [];
        }
        
        $pattern = $this->pattern;
        return array_filter($data, function($key) use ($pattern) {
            return preg_match($pattern, $key);
        }, ARRAY_FILTER_USE_KEY);
    }
}