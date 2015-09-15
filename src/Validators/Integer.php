<?php

namespace RValidate\Validators;


class Integer implements \RValidate\Interfaces\Validator
{
    public function validate($data) 
    {
        if (!is_int($data)) {
            throw new \RValidate\Exceptions\ValidateException('must be integer');
        }
        
        return true;
    }
}