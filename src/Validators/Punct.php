<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Punct implements Interfaces\Validator
{
    public function validate($data) : \bool
    {
        if (!ctype_punct($data)) {
            throw new Exceptions\ValidateException('must be punct');
        }
        
        return true;
    }
}