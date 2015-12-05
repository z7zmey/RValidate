<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class IsNumber implements Interfaces\Validator
{
    public function validate($data) : \bool
    {
        if (!is_numeric($data)) {
            throw new Exceptions\ValidateException('must be numeric');
        }
        
        return true;
    }
}