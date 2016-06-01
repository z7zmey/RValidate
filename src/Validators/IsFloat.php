<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class IsFloat implements Interfaces\Validator
{
    public function validate($data) : bool
    {
        return is_float($data);
    }

    public function getError() : string
    {
        return 'must be float';
    }
}