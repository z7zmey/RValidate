<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class NotEmpty implements Interfaces\Validator
{
    public function validate($data) : bool
    {
        if (is_string($data)) {
            $data = trim($data);
        }
        
        return $data !== null && $data !== '' && $data !== [];
    }

    public function getError() : string
    {
        return 'must not be empty';
    }
}