<?php

namespace RValidate;


class Validator
{
    public static function run($data, $pattern)
    {
        /** @noinspection ArrayCastingEquivalentInspection object must wrap too */
        if (!is_array($pattern)) {
            $pattern = [$pattern];
        }
        
        $exceptions = new Exceptions\ValidateExceptions();

        $rules = new Iterators\Rules(null, $data, $pattern);
        $iterator = new Iterators\RulesIterator($rules);

        foreach ($iterator as $k => $rule) {
            try {
                $rule->validate($iterator->getData());
            } catch (Exceptions\ValidateException $e) {
                $e->setPath($iterator->getPath());
                $exceptions->add($e);
            }
        }
        
        if ($exceptions->count()) {
            throw $exceptions;
        }
        
        return $rules->getData();
    }
}