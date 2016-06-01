<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Method implements Interfaces\Validator
{
    protected $method;
    
    public function __construct($method)
    {
        $this->method = $method;
    }
    
    public function validate($data) : bool
    {
        return is_object($data) && method_exists($data, $this->method);
    }

    public function getError() : string
    {
        return "must have method '{$this->method}'";
    }
}