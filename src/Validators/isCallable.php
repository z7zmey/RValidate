<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class IsCallable implements Interfaces\Validator
{
    public function validate($data) : bool
    {
        return is_callable($data);
    }

    public function getError() : string
    {
        return 'must be callable';
    }
}