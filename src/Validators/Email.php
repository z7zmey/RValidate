<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Email implements Interfaces\Validator
{
    public function validate($data) : \bool
    {
        if (false === filter_var($data, FILTER_VALIDATE_EMAIL)) {
            throw new Exceptions\ValidateException('must be email');
        }
        
        return true;
    }
}