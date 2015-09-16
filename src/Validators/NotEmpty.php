<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class NotEmpty implements Interfaces\Validator
{
    public function validate($data) 
    {
        if (empty($data)) {
            throw new Exceptions\ValidateException('must not be empty');
        }
        
        return true;
    }
}