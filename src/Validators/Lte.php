<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Lte implements Interfaces\Validator
{
    protected $count;
    
    public function __construct($count)
    {
        $this->count = (int)$count;
    }
    
    public function validate($data) 
    {
        if (!is_numeric($data) || $data > $this->count) {
            throw new Exceptions\ValidateException("must be lower or equal {$this->count}");
        }
        
        return true;
    }
}