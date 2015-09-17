<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Length implements Interfaces\Validator
{
    protected $length;
    
    public function __construct($length)
    {
        $this->length = (int)$length;
    }
    
    public function validate($data) 
    {
        if (!is_string($data) || mb_strlen($data, 'utf-8') !== $this->length) {
            throw new Exceptions\ValidateException("must contain {$this->length} symbols");
        }
        
        return true;
    }
}