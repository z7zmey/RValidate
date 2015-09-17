<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Equal implements Interfaces\Validator
{
    protected $equal;
    protected $strict;
    
    public function __construct($equal, $strict = false)
    {
        $this->equal = $equal;
        $this->strict = $strict;
    }
    
    public function validate($data) 
    {
        if (($this->strict && $data !== $this->equal) || (!$this->strict && $data != $this->equal)) {
            throw new Exceptions\ValidateException('must equal');
        }
        
        return true;
    }
}