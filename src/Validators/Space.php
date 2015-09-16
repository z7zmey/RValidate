<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Space implements Interfaces\Validator
{
    public function validate($data) 
    {
        if (!ctype_space($data)) {
            throw new Exceptions\ValidateException('must be space');
        }
        
        return true;
    }
}