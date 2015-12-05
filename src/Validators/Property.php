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
    
    public function validate($data) : \bool
    {
        if (!is_object($data) || !property_exists($data, $this->propName)) {
            throw new Exceptions\ValidateException("must have property '{$this->propName}'");
        }
        
        return true;
    }
}