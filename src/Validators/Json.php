<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Json implements Interfaces\Validator
{
    public function validate($data) : bool
    {
        json_decode($data);
        return json_last_error() === JSON_ERROR_NONE;
    }

    public function getError() : string
    {
        return 'must be json';
    }
}