<?php

namespace RValidate\Iterators;

use RValidate\Sub;

class Rules extends \ArrayIterator implements \RecursiveIterator
{
    protected $data;
    protected $key;
    
    private $validationMap = [];

    public function __construct($key, $data, array $pattern)
    {
        parent::__construct();
        
        $this->key = $key;
        $this->data = $data;
        
        $has_sub_validators = false;
        foreach ($pattern as $val) {
            if ($val instanceof Sub) {
                $this->setSub($val);
                $has_sub_validators = true;
            } else {
                $this->offsetSet(null, $val);
            }
        }
        
        if ($has_sub_validators && is_array($this->data)) {
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

            $this->offsetSet(null, $rule);
        }
    }

    // RecursiveIterator methods

    public function hasChildren() : bool {
        return $this->current() instanceof Rules;
    }

    public function getChildren() {
        return $this->current();
    }
}