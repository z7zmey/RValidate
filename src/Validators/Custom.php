<?php

namespace RValidate\Validators;


class Custom implements \RValidate\Interfaces\Validator
{
    private $func;
    private $errorMessage;
    
    public function __construct(\closure $func, $message = 'custom validation')
    {
        $this->func = $func;
        $this->errorMessage = $message;
    }
    
    public function validate($data) 
    {
        if (!call_user_func($this->func, $data)) {
            throw new \RValidate\Exceptions\ValidateException($this->errorMessage);
        }
        
        return true;
    }
}