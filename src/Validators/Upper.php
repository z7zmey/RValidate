<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Upper implements Interfaces\Validator
{
    public function validate($data) : bool
    {
        if (!ctype_upper($data)) {
            throw new Exceptions\ValidateException('must be upper case');
        }
        
        return true;
    }
}