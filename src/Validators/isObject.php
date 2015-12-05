<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class IsObject implements Interfaces\Validator
{
    public function validate($data) : \bool
    {
        if (!is_object($data)) {
            throw new Exceptions\ValidateException('must be object');
        }
        
        return true;
    }
}