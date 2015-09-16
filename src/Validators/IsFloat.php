<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class IsFloat implements Interfaces\Validator
{
    public function validate($data) 
    {
        if (!is_float($data)) {
            throw new Exceptions\ValidateException('must be float');
        }
        
        return true;
    }
}