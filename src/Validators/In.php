<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class In implements Interfaces\Validator
{
    private $haystack;
    private $strict;
    private $message;
    
    public function __construct(array $haystack, $strict = false)
    {
        $this->haystack = $haystack;
        $this->strict = $strict;


        $haystackStr = [];
        foreach ($haystack as $item) {
            $haystackStr[] = is_scalar($item)? "'{$item}'": '|' . gettype($item) . '|';
        }
        
        $this->message = 'mast be in [' . implode(', ', $haystackStr) . ']';
    }
    
    public function validate($data) : bool
    {
        return in_array($data, $this->haystack, $this->strict);
    }

    public function getError() : string
    {
        return $this->message;
    }
}