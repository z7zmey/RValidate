<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class IsObject implements Interfaces\Validator
{
    public function validate($data) : bool
    {
        return is_object($data);
    }

    public function getError() : string
    {
        return 'must be object';
    }
}