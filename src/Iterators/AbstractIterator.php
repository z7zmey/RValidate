<?php

namespace RValidate\Iterators;


abstract class AbstractIterator implements \RecursiveIterator
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

    public function valid() {
        return array_key_exists($this->position, $this->storage);
    }

    public function current() {
        return $this->storage[$this->position];
    }

    public function key() {
        return $this->position;
    }

    // RecursiveIterator methods

    public function hasChildren() {
        return $this->storage[$this->position] instanceof $this;
    }

    public function getChildren() {
        return $this->storage[$this->position];
    }
}