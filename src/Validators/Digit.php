<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Digit implements Interfaces\Validator
{
    public function validate($data) : bool
    {
        return ctype_digit($data);
    }

    public function getError() : string
    {
        return 'must be digit';
    }
}