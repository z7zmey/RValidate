<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class IsScalar implements Interfaces\Validator
{
    public function validate($data) : bool
    {
        return is_scalar($data);
    }

    public function getError() : string
    {
        return 'must be scalar';
    }
}