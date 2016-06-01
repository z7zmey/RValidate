<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class IsArray implements Interfaces\Validator
{
    public function validate($data) : bool
    {
        return is_array($data);
    }

    public function getError() : string
    {
        return 'must be array';
    }
}