<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Xdigit implements Interfaces\Validator
{
    public function validate($data) : bool
    {
        return ctype_xdigit($data);
    }

    public function getError() : string
    {
        return 'must be xdigit';
    }
}