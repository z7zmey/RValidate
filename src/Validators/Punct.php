<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Punct implements Interfaces\Validator
{
    public function validate($data) : bool
    {
        return ctype_punct($data);
    }

    public function getError() : string
    {
        return 'must be punct';
    }
}