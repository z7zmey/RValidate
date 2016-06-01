<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Instance implements Interfaces\Validator
{
    protected $className;
    
    public function __construct($class)
    {
        $this->className = $class;
    }
    
    public function validate($data) : bool
    {
        return is_object($data) && $data instanceof $this->className;
    }

    public function getError() : string
    {
        return "must be instance of '{$this->className}'";
    }
}