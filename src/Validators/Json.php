<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Json implements Interfaces\Validator
{
    public function validate($data) : \bool
    {
        json_decode($data);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exceptions\ValidateException('must be json');
        }
        
        return true;
    }
}