<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class IsResource implements Interfaces\Validator
{
    public function validate($data) : \bool
    {
        if (!is_resource($data)) {
            throw new Exceptions\ValidateException('must be resource');
        }
        
        return true;
    }
}