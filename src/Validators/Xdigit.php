<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Xdigit implements Interfaces\Validator
{
    public function validate($data) 
    {
        if (!ctype_xdigit($data)) {
            throw new Exceptions\ValidateException('must be xdigit');
        }
        
        return true;
    }
}