<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Required implements Interfaces\Validator
{
    public function validate($data) : \bool
    {
        if (null === $data) {
            throw new Exceptions\ValidateException('required');
        }
        
        return true;
    }
}