<?php

namespace RValidate\Iterators;

class Errors extends \ArrayIterator implements \RecursiveIterator
{
    protected $map = [];
    protected $key;

    public function __construct(string $key = '')
    {
        parent::__construct();
        
        $this->key = $key;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function setError(string $message)
    {
        parent::offsetSet(null, $message);
    }
    
    public function getByPath(array $path) : Errors
    {
        if (!$path) {
            return $this;
        }
        
        $index = array_shift($path);
        
        return $this->offsetGet($index)
            ->getByPath($path);
    }
    
    // ArrayAccess methods
    
    public function offsetGet($index) : Errors
    {
        if (!array_key_exists($index, $this->map)) {
            $this->map[$index] = new Errors($index);
            $this->offsetSet(null, $this->map[$index]);
        }
        
        return $this->map[$index];
    }

    // RecursiveIterator methods

    public function hasChildren() : bool 
    {
        return $this->current() instanceof $this;
    }

    public function getChildren() 
    {
        return $this->current();
    }
    
    // Magic
    
    public function __toString()
    {
        return $this->key;
    }
}