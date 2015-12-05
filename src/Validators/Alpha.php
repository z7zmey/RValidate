<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Alpha implements Interfaces\Validator
{
    public function validate($data) : \bool
    {
        if (!ctype_alpha($data)) {
            throw new Exceptions\ValidateException('must be alpha');
        }
        
        return true;
    }
}