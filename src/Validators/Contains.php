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
    
    public function validate($data) : bool
    {
        return strpos($data, $this->str) !== false;
    }

    public function getError() : string
    {
        return "must contain '{$this->str}'";
    }
}