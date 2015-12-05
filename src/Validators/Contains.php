<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Contains implements Interfaces\Validator
{
    protected $str;
    
    public function __construct($str)
    {
        $this->str = $str;
    }
    
    public function validate($data) : \bool
    {
        if (false === strpos($data, $this->str)) {
            throw new Exceptions\ValidateException("must contain '{$this->str}'");
        }
        
        return true;
    }
}