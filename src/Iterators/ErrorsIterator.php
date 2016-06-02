<?php

namespace RValidate\Iterators;

/**
 * Class ErrorsIterator
 * @method Errors getInnerIterator()
 * @method Errors getSubIterator($level)
 */
class ErrorsIterator extends \RecursiveIteratorIterator
{
    public function __construct(Errors $iterator)
    {
        parent::__construct($iterator, \RecursiveIteratorIterator::LEAVES_ONLY);
    }
    
    public function getPath() : array
    {
        $path = [];
        
        for ($i = $this->getDepth(); $i>0; $i--) {
            array_unshift($path, $this->getSubIterator($i)->getKey());
        }

        return $path;
    }
    
    public function current()
    {
        $message = parent::current();
        
        return '[' . implode('][', $this->getPath()) . '] -> ' . $message;
    }
}