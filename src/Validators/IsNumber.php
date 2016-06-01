<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class IsNumber implements Interfaces\Validator
{
    public function validate($data) : bool
    {
        return is_numeric($data);
    }

    public function getError() : string
    {
        return 'must be numeric';
    }
}