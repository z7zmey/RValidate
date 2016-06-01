<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Between implements Interfaces\Validator
{
    protected $a;
    protected $b;
    
    public function __construct($a, $b)
    {
        $this->a = (int)$a;
        $this->b = (int)$b;
    }
    
    public function validate($data) : bool
    {
        return is_numeric($data) && $data > $this->a && $data < $this->b;
    }

    public function getError() : string
    {
        return "must be between {$this->a} and {$this->b}";
    }
}