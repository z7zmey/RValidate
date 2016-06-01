<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Ip implements Interfaces\Validator
{
    public function validate($data) : bool
    {
        return filter_var($data, FILTER_VALIDATE_IP) !== false;
    }

    public function getError() : string
    {
        return 'must be ip address';
    }
}