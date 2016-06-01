<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Keys implements Interfaces\Validator
{
    private $keys;
    
    public function __construct(array $keys)
    {
        $this->keys = $keys;
    }
    
    public function validate($data) : bool
    {
        $keys = array_flip($this->keys);
        return is_array($data) && !array_diff_key($keys, $data);
    }

    public function getError() : string
    {
        return 'must contain keys [' . implode(', ', $this->keys) .']';
    }
}