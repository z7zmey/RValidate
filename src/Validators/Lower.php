<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Lower implements Interfaces\Validator
{
    public function validate($data) 
    {
        if (!ctype_lower($data)) {
            throw new Exceptions\ValidateException('must be lower case');
        }
        
        return true;
    }
}