<?php

namespace RValidate\Filters;


class Equal implements \RValidate\Interfaces\Filter
{
    private $pattern;
    
    public function __construct($pattern)
    {
        $this->pattern = $pattern;
    }
    
    public function filter($data)
    {
        if (!is_array($data) || !array_key_exists($this->pattern, $data)) {
            return [];
        }
        
        return [$this->pattern => $data[$this->pattern]];
    }
}