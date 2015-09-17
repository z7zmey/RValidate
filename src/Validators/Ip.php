<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Ip implements Interfaces\Validator
{
    public function validate($data) 
    {
        if (false === filter_var($data, FILTER_VALIDATE_IP)) {
            throw new Exceptions\ValidateException('must be ip address');
        }
        
        return true;
    }
}