<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Lower implements Interfaces\Validator
{
    public function validate($data) : bool
    {
        return ctype_lower($data);
    }

    public function getError() : string
    {
        return 'must be lower case';
    }
}