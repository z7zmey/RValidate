<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Positive implements Interfaces\Validator
{
    public function validate($data) 
    {
        if ($data < 0) {
            throw new Exceptions\ValidateException('must be positive');
        }
        
        return true;
    }
}