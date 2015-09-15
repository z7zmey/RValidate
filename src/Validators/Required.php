<?php

namespace RValidate\Validators;


class Required implements \RValidate\Interfaces\Validator
{
    public function validate($data) 
    {
        if (!isset($data)) {
            throw new \RValidate\Exceptions\ValidateException('required');
        }
        
        return true;
    }
}