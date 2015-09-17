<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Date implements Interfaces\Validator
{
    public function validate($data) 
    {
        if (false === strtotime($data)) {
            throw new Exceptions\ValidateException('must be date');
        }
        
        return true;
    }
}