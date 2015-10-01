<?php

namespace RValidate\Iterators;


use RValidate\Sub;

class Rules extends AbstractIterator implements \RecursiveIterator
{
    protected $data;
    protected $key;

    public function __construct($key, $data, Pattern $patternIterator)
    {
        $this->data = $data;
        $this->key = $key;
        foreach ($patternIterator as $patternVal) {
            if ($patternVal instanceof Sub) {
                $filtered = $patternVal->getFilter()->filter($this->data);
                foreach ($filtered as $key => $val) {
                    $this->storage[] = new Rules($key, $val, $patternVal->getPattern());
                }
            } else {
                $this->storage[] = $patternVal;
            }
        }
    }

    public function getKey()
    {
        return $this->key;
    }
    
    public function getData()
    {
        return $this->data;
    }

    // RecursiveIterator methods

    public function hasChildren() {
        return $this->storage[$this->position] instanceof Rules;
    }

    public function getChildren() {
        return $this->storage[$this->position];
    }
}