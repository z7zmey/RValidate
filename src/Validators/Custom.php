<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Custom implements Interfaces\Validator
{
    private $func;
    private $errorMessage;
    
    public function __construct(\closure $func, $message = 'custom validation')
    {
        $this->func = $func;
        $this->errorMessage = $message;
    }
    
    public function validate($data) : \bool
    {
        if (!call_user_func($this->func, $data)) {
            throw new Exceptions\ValidateException($this->errorMessage);
        }
        
        return true;
    }
}