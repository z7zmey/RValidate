<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Count implements Interfaces\Validator
{
    protected $count;
    
    public function __construct($count)
    {
        $this->count = (int)$count;
    }
    
    public function validate($data) 
    {
        if (!is_array($data) || count($data) !== $this->count) {
            throw new Exceptions\ValidateException("must contain {$this->count} values");
        }
        
        return true;
    }
}