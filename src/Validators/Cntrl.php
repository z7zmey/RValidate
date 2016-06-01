<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Cntrl implements Interfaces\Validator
{
    public function validate($data) : bool
    {
        return ctype_cntrl($data);
    }

    public function getError() : string
    {
        return 'must be cntrl';
    }
}