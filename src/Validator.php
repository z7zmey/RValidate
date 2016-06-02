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
        
        $exception = new Exceptions\ValidateException();

        $rules = new Iterators\Rules(null, $data, $pattern);
        $iterator = new Iterators\RulesIterator($rules);

        foreach ($iterator as $k => $rule) {
            if (!$rule->validate($iterator->getInnerIterator()->getData())) {
                $exception->addError([
                    'path' => $iterator->getPath(),
                    'message' => $rule->getError(),
                ]);
            }
        }
        
        if ($exception->getErrors()) {
            throw $exception;
        }
        
        return $rules->getData();
    }
}