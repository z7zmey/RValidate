<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class IsResource implements Interfaces\Validator
{
    public function validate($data) : bool
    {
        return is_resource($data);
    }

    public function getError() : string
    {
        return 'must be resource';
    }
}