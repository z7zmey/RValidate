<?php

namespace RValidate\Iterators;

use RValidate\Exceptions\Exception;
use RValidate\Sub;

class Pattern extends AbstractIterator
{
    public function __construct(array $rules)
    {
        $this->storage = array_merge($this->storage, $rules);
    }
    
    // RecursiveIterator methods

    public function hasChildren() {
        return $this->storage[$this->position] instanceof Sub;
    }

    public function getChildren() {
        $sub = $this->storage[$this->position];
        
        if (!$sub instanceof Sub) {
            throw new Exception('Current value must be instance of Filter');
        }
        
        return $sub->getPattern();
    }
}