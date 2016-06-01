<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Gte implements Interfaces\Validator
{
    protected $count;
    
    public function __construct($count)
    {
        $this->count = (int)$count;
    }
    
    public function validate($data) : bool
    {
        return is_numeric($data) && $data >= $this->count;
    }

    public function getError() : string
    {
        return "must be greater or equal {$this->count}";
    }
}