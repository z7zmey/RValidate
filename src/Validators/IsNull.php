<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class IsNull implements Interfaces\Validator
{
    public function validate($data) : bool
    {
        return $data === null;
    }

    public function getError() : string
    {
        return 'must be null';
    }
}