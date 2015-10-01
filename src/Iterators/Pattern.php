<?php

namespace RValidate\Iterators;

class Pattern extends AbstractIterator
{
    public function __construct(array $pattern)
    {
        $this->storage = $pattern;
    }
}