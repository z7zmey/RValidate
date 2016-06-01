<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Required implements Interfaces\Validator
{
    public function validate($data) : bool
    {
        return $data !== null;
    }

    public function getError() : string
    {
        return 'required';
    }
}