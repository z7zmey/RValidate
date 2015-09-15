<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Arr implements Interfaces\Validator
{
    public function validate($data) 
    {
        if (!is_array($data)) {
            throw new Exceptions\ValidateException('must be array');
        }
        
        return true;
    }
}