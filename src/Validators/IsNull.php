<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class IsNull implements Interfaces\Validator
{
    public function validate($data) : bool
    {
        if (null !== $data) {
            throw new Exceptions\ValidateException('must be null');
        }
        
        return true;
    }
}