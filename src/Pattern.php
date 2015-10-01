<?php

namespace RValidate;

use RValidate\Iterators\AbstractIterator;

class Pattern extends AbstractIterator
{
    public function __construct(array $pattern)
    {
        $this->storage = $pattern;
    }
}