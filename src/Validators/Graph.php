<?php

namespace RValidate\Validators;

use RValidate\Interfaces;
use RValidate\Exceptions;

class Graph implements Interfaces\Validator
{
    public function validate($data) : bool
    {
        return ctype_graph($data);
    }

    public function getError() : string
    {
        return 'must be graph';
    }
}