<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class IsInteger implements Interfaces\Validator
{
    public function validate($data) : bool
    {
        if (!is_int($data)) {
            throw new Exceptions\ValidateException('must be integer');
        }
        
        return true;
    }
}