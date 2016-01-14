<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class IsBoolean implements Interfaces\Validator
{
    public function validate($data) : bool
    {
        if (!is_bool($data)) {
            throw new Exceptions\ValidateException('must be boolean');
        }
        
        return true;
    }
}