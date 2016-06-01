<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Min implements Interfaces\Validator
{
    protected $length;
    
    public function __construct($length)
    {
        $this->length = (float)$length;
    }
    
    public function validate($data) : bool
    {
        return (is_numeric($data) && $data >= $this->length) 
            || (is_array($data) && count($data) >= $this->length) 
            || (is_string($data) && mb_strlen($data, 'utf-8') >= $this->length);
    }

    public function getError() : string
    {
        return "must be minimal {$this->length}";
    }
}