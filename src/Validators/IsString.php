<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class IsString implements Interfaces\Validator
{
    public function validate($data) : bool
    {
        return is_string($data);
    }

    public function getError() : string
    {
        return 'must be string';
    }
}