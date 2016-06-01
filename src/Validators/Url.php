<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Url implements Interfaces\Validator
{
    public function validate($data) : bool
    {
        return filter_var($data, FILTER_VALIDATE_URL) !== false;
    }

    public function getError() : string
    {
        return 'must be url';
    }
}