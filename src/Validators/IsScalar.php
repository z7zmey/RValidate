<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class IsScalar implements Interfaces\Validator
{
    public function validate($data) : bool
    {
        if (!is_scalar($data)) {
            throw new Exceptions\ValidateException('must be scalar');
        }
        
        return true;
    }
}