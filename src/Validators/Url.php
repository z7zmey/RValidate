<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Url implements Interfaces\Validator
{
    public function validate($data) : \bool
    {
        if (false === filter_var($data, FILTER_VALIDATE_URL)) {
            throw new Exceptions\ValidateException('must be url');
        }
        
        return true;
    }
}