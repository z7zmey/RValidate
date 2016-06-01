<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Property implements Interfaces\Validator
{
    protected $propName;
    
    public function __construct($propName)
    {
        $this->propName = $propName;
    }
    
    public function validate($data) : bool
    {
        return is_object($data) && property_exists($data, $this->propName);
    }

    public function getError() : string
    {
        return "must have property '{$this->propName}'";
    }
}