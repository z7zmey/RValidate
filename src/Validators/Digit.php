<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Digit implements Interfaces\Validator
{
    public function validate($data) 
    {
        if (!ctype_digit($data)) {
            throw new Exceptions\ValidateException('must be digit');
        }
        
        return true;
    }
}