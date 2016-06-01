<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Upper implements Interfaces\Validator
{
    public function validate($data) : bool
    {
        return ctype_upper($data);
    }

    public function getError() : string
    {
        return 'must be upper case';
    }
}