<?php

namespace RValidate\Iterators;

use RValidate\Sub;

class Rules extends \ArrayIterator implements \RecursiveIterator
{
    protected $data = [];
    protected $key;

    public function __construct($key, $data, array $pattern)
    {
        parent::__construct();
        
        $this->key = $key;
        
        foreach ($pattern as $val) {
            if ($val instanceof Sub) {
                $this->setSub($val, $data);
            } else {
                $this->offsetSet(null, $val);
            }
        }
        
        if (!$this->data) {
            $this->data = $data;
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

    private function setSub(Sub $sub, $data)
    {
        $filtered = $sub->getFilter()->filter($data);
        foreach ($filtered as $key => $val) {
            $rule = new Rules($key, $val, $sub->getPattern());
            $this->data[$key] = $rule->getData();
            $this->offsetSet(null, $rule);
        }
        
        return $filtered;
    }

    // RecursiveIterator methods

    public function hasChildren() : bool {
        return $this->current() instanceof Rules;
    }

    public function getChildren() {
        return $this->current();
    }
}