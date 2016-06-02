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
        
        $errors = new Iterators\Errors('');
        $rules = new Iterators\Rules(null, $data, $pattern);
        $iterator = new Iterators\RulesIterator($rules);

        foreach ($iterator as $k => $rule) {
            if (!$rule->validate($iterator->getInnerIterator()->getData())) {
                $errors
                    ->getByPath($iterator->getPath())
                    ->setError($rule->getError());
            }
        }
        
        if (count($errors)) {
            $exception = new Exceptions\ValidateException();
            $exception->setErrors($errors);
            throw $exception;
        }
        
        return $rules->getData();
    }
}