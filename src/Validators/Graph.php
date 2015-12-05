<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Graph implements Interfaces\Validator
{
    public function validate($data) : \bool
    {
        if (!ctype_graph($data)) {
            throw new Exceptions\ValidateException('must be graph');
        }
        
        return true;
    }
}