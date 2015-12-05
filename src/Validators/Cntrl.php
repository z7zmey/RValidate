<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Cntrl implements Interfaces\Validator
{
    public function validate($data) : \bool
    {
        if (!ctype_cntrl($data)) {
            throw new Exceptions\ValidateException('must be cntrl');
        }
        
        return true;
    }
}