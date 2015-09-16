<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class IsCallable implements Interfaces\Validator
{
    public function validate($data) 
    {
        if (!is_callable($data)) {
            throw new Exceptions\ValidateException('must be callable');
        }
        
        return true;
    }
}