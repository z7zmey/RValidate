<?php

namespace RValidate;


class Validator
{
    public static function run($data, $pattern)
    {
        $exceptions = new Exceptions\ValidateExceptions();

        $rules = new Iterators\Rules(null, $data, $pattern);
        $iterator = new Iterators\RulesIterator($rules);

        foreach ($iterator as $rule) {
            try {
                $rule->validate($iterator->getInnerIterator()->getData());
            } catch (Exceptions\ValidateException $e) {
                $e->setPath($iterator->getPath());
                $exceptions->add($e);
            }
        }
        
        if ($exceptions->count()) {
            throw $exceptions;
        }
        
        return true;
    }
}