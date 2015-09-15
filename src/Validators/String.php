<?php

namespace RValidate\Validators;


class String implements \RValidate\Interfaces\Validator
{
    public function validate($data) 
    {
        if (!is_string($data)) {
            throw new \RValidate\Exceptions\ValidateException('must be string');
        }
        
        return true;
    }
}