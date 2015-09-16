<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class IsString implements Interfaces\Validator
{
    public function validate($data) 
    {
        if (!is_string($data)) {
            throw new Exceptions\ValidateException('must be string');
        }
        
        return true;
    }
}