<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class IsBoolean implements Interfaces\Validator
{
    public function validate($data) : bool
    {
        return is_bool($data);
    }

    public function getError() : string
    {
        return 'must be boolean';
    }
}