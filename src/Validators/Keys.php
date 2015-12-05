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
    
    public function validate($data) : \bool
    {
        if (!is_array($data) || array_diff_key($this->keys, $data)) {
            $keysStr = implode(', ', array_keys($this->keys));
            throw new Exceptions\ValidateException("must contain keys [{$keysStr}]");
        }

        return true;
    }
}