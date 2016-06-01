<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Date implements Interfaces\Validator
{
    public function validate($data) : bool
    {
        return strtotime($data) !== false;
    }

    public function getError() : string
    {
        return 'must be date';
    }
}