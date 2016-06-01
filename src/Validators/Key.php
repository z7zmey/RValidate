<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Key implements Interfaces\Validator
{
    private $key;
    
    public function __construct($key)
    {
        $this->key = $key;
    }
    
    public function validate($data) : bool
    {
        return is_array($data) && array_key_exists($this->key, $data);
    }

    public function getError() : string
    {
        return 'must contain key ' . $this->key;
    }
}