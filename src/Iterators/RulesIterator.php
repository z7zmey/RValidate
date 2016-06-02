<?php

namespace RValidate\Iterators;

use RValidate\Interfaces\Validator;

/**
 * Class RulesIterator
 * @method Rules getInnerIterator()
 * @method Rules getSubIterator($level)
 * @method Validator current()
 */
class RulesIterator extends \RecursiveIteratorIterator
{
    public function __construct(Rules $iterator, $mode = \RecursiveIteratorIterator::LEAVES_ONLY, $flags = 0)
    {
        parent::__construct($iterator, $mode, $flags);
    }
    
    public function getPath() : array
    {
        $path = [];
        
        for ($i = $this->getDepth(); $i>0; $i--) {
            array_unshift($path, $this->getSubIterator($i)->getKey());
        }

        return $path;
    }
}