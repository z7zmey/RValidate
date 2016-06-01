<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Alnum implements Interfaces\Validator
{
    public function validate($data) : bool
    {
        return ctype_alnum($data);
    }
    
    public function getError() : string
    {
        return 'must be alphanumeric';
    }
}