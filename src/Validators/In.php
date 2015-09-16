<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class In implements Interfaces\Validator
{
    private $haystack;
    private $strict;
    
    public function __construct(array $haystack, $strict = false)
    {
        $this->haystack = $haystack;
        $this->strict = $strict;
    }
    
    public function validate($data) 
    {
        if (!in_array($data, $this->haystack, $this->strict)) {
            throw new Exceptions\ValidateException('mast be in array');
        }
        
        return true;
    }
}