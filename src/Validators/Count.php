<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Count implements Interfaces\Validator
{
    protected $count;
    
    public function __construct($count)
    {
        $this->count = (int)$count;
    }
    
    public function validate($data) : bool
    {
        return is_array($data) && count($data) === $this->count;
    }

    public function getError() : string
    {
        return "must contain {$this->count} values";
    }
}