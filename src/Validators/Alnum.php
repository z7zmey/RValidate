<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Alnum implements Interfaces\Validator
{
    public function validate($data) 
    {
        if (!ctype_alnum($data)) {
            throw new Exceptions\ValidateException('must be alnum');
        }
        
        return true;
    }
}