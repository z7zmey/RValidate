<?php

namespace RValidate\Validators;

use Closure;
use RValidate\Interfaces;
use RValidate\Exceptions;

class Custom implements Interfaces\Validator
{
    private $func;
    private $errorMessage;
    
    public function __construct(Closure $func, $message = 'custom validation')
    {
        $this->func = $func;
        $this->errorMessage = $message;
    }
    
    public function validate($data) : bool
    {
        return call_user_func($this->func, $data);
    }

    public function getError() : string
    {
        return $this->errorMessage;
    }
}