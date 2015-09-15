<?php

namespace RValidate\Filters;


class All implements \RValidate\Interfaces\Filter
{
    public function filter($data)
    {
        return is_array($data) ? $data : [];
    }
}