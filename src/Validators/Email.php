<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Email implements Interfaces\Validator
{
    public function validate($data) : bool
    {
        return filter_var($data, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function getError() : string
    {
        return 'must be email';
    }
}