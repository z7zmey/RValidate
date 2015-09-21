<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Regex implements Interfaces\Validator
{
    protected $regex;
    
    public function __construct($regex)
    {
        $this->regex = $regex;
    }
    
    public function validate($data) 
    {
        if (!is_string($data) || !preg_match($this->regex, $data)) {
            throw new Exceptions\ValidateException('must match ' . $this->regex);
        }
        
        return true;
    }
}