<?php

namespace RValidate\Iterators;

use RValidate\Sub;

class Rules extends AbstractIterator implements \RecursiveIterator
{
    protected $data;
    protected $key;
    
    private $validationMap = [];

    public function __construct($key, $data, array $pattern)
    {
        $this->key = $key;
        $this->data = $data;
        
        foreach ($pattern as $val) {
            if ($val instanceof Sub) {
                $this->setSub($val);
            } else {
                $this->storage[] = $val;
            }
        }
        
        if (is_array($this->data)) {
            $this->data = array_intersect_key($this->data, $this->validationMap);
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

    private function setSub(Sub $sub)
    {
        $filtered = $sub->getFilter()->filter($this->data);
        foreach ($filtered as $key => $val) {
            $rule = new Rules($key, $val, $sub->getPattern());
            $this->data[$key] = $rule->getData();
            $this->validationMap[$key] = true;

            $this->storage[] = $rule;
        }
    }

    // RecursiveIterator methods

    public function hasChildren() : \bool {
        return $this->storage[$this->position] instanceof Rules;
    }

    public function getChildren() {
        return $this->storage[$this->position];
    }
}