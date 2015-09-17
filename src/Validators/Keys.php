<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Keys implements Interfaces\Validator
{
    private $keys;
    
    public function __construct(array $keys)
    {
        $this->keys = array_flip($keys);
    }
    
    public function validate($data) 
    {
        if (!is_array($data) || array_diff_key($this->keys, $data)) {
            throw new Exceptions\ValidateException('must contain some keys');
        }

        return true;
    }
}