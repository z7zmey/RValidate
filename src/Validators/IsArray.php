<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class IsArray implements Interfaces\Validator
{
    public function validate($data) : bool
    {
        if (!is_array($data)) {
            throw new Exceptions\ValidateException('must be array');
        }
        
        return true;
    }
}