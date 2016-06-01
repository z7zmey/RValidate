<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class IsInteger implements Interfaces\Validator
{
    public function validate($data) : bool
    {
        return is_int($data);
    }

    public function getError() : string
    {
        return 'must be integer';
    }
}