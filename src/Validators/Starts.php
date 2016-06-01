<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Starts implements Interfaces\Validator
{
    protected $str;
    
    public function __construct($str)
    {
        $this->str = $str;
    }
    
    public function validate($data) : bool
    {
        return $this->str === mb_substr($data, 0, mb_strlen($this->str, 'utf-8'), 'utf-8');
    }

    public function getError() : string
    {
        return "must starts '{$this->str}'";
    }
}