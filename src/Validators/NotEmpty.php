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

        if ($data === null || $data === '' || $data === []) {
            throw new Exceptions\ValidateException('must not be empty');
        }
        
        return true;
    }
}