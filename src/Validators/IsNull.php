<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class IsNull implements Interfaces\Validator
{
    public function validate($data) 
    {
        if (!is_null($data)) {
            throw new Exceptions\ValidateException('must be null');
        }
        
        return true;
    }
}