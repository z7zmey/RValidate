<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Equal implements Interfaces\Validator
{
    protected $equal;
    
    public function __construct($equal)
    {
        $this->equal = $equal;
    }
    
    public function validate($data) : bool
    {
        if ($data !== $this->equal) {
            throw new Exceptions\ValidateException('must equal');
        }
        
        return true;
    }
}