<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Prnt implements Interfaces\Validator
{
    public function validate($data) 
    {
        if (!ctype_print($data)) {
            throw new Exceptions\ValidateException('must be print');
        }
        
        return true;
    }
}