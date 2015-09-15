<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Integer implements Interfaces\Validator
{
    public function validate($data) 
    {
        if (!is_int($data)) {
            throw new Exceptions\ValidateException('must be integer');
        }
        
        return true;
    }
}