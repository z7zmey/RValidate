<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Alpha implements Interfaces\Validator
{
    public function validate($data) : bool
    {
        return ctype_alpha($data);
    }

    public function getError() : string
    {
        return 'must be alpha';
    }
}