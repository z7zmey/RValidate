<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Positive implements Interfaces\Validator
{
    public function validate($data) : bool
    {
        return $data >= 0;
    }

    public function getError() : string
    {
        return 'must be positive';
    }
}