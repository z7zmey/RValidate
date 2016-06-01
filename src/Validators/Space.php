<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Space implements Interfaces\Validator
{
    public function validate($data) : bool
    {
        return ctype_space($data);
    }

    public function getError() : string
    {
        return 'must be space';
    }
}