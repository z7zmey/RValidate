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
    
    public function validate($data) : \bool
    {
        if (!is_array($data) || !array_key_exists($this->key, $data)) {
            throw new Exceptions\ValidateException('must contain key ' . $this->key);
        }

        return true;
    }
}