<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Negative implements Interfaces\Validator
{
    public function validate($data) : bool
    {
        if ($data >= 0) {
            throw new Exceptions\ValidateException('must be negative');
        }
        
        return true;
    }
}