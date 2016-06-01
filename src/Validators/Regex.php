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
    
    public function validate($data) : bool
    {
        return is_string($data) && preg_match($this->regex, $data);
    }

    public function getError() : string
    {
        return 'must match ' . $this->regex;
    }
}