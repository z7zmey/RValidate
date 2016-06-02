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
        $path = [$this->getInnerIterator()->getKey()];

        if (!$depth = $this->getDepth()) {
            return $path;
        }

        for ($i = $depth-1; $i>=0; $i--) {
            array_unshift($path, $this->getSubIterator($i)->getKey());
        }

        return $path;
    }
}