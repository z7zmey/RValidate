<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Prnt implements Interfaces\Validator
{
    public function validate($data) : bool
    {
        return ctype_print($data);
    }

    public function getError() : string
    {
        return 'must be print';
    }
}