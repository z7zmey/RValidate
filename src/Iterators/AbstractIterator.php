<?php

namespace RValidate\Iterators;


abstract class AbstractIterator implements \Iterator
{
    protected $position = 0;
    protected $storage = [];

    // iterator methods

    public function rewind() {
        $this->position = 0;
    }

    public function next() {
        $this->position++;
    }

    public function valid() : \bool {
        return array_key_exists($this->position, $this->storage);
    }

    public function current() {
        return $this->storage[$this->position];
    }

    public function key() : \int {
        return $this->position;
    }
}