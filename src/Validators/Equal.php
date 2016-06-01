<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Equal implements Interfaces\Validator
{
    protected $equal;
    
    public function __construct($equal)
    {
        $this->equal = $equal;
    }
    
    public function validate($data) : bool
    {
        return $data === $this->equal;
    }

    public function getError() : string
    {
        return 'must equal';
    }
}