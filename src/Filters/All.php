<?php

namespace RValidate\Filters;

use RValidate\Interfaces;

class All implements Interfaces\Filter
{
    public function filter($data) : array
    {
        return is_array($data) ? $data : [];
    }
}