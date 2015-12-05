<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Gt implements Interfaces\Validator
{
    protected $count;
    
    public function __construct($count)
    {
        $this->count = (int)$count;
    }
    
    public function validate($data) : \bool
    {
        if (!is_numeric($data) || $data <= $this->count) {
            throw new Exceptions\ValidateException("must be greater than {$this->count}");
        }
        
        return true;
    }
}