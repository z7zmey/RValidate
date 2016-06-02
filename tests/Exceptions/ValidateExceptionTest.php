<?php

namespace Exceptions;

use RValidate\Exceptions\ValidateException;

class ValidateExceptionTest extends \PHPUnit_Framework_TestCase
{
    public function testSetGetErrors()
    {
        $errors = new \RValidate\Iterators\Errors();
        $errors['test'][1]->setError('some message');

        $e = new ValidateException('message');
        $e->setErrors($errors);

        self::assertEquals($errors, $e->getErrors());
    }
    
    public function testGetErrorsIterator()
    {
        $errors = new \RValidate\Iterators\Errors();
        $errors['test'][1]->setError('some message');

        $e = new ValidateException('message');
        $e->setErrors($errors);

        self::assertInstanceOf('\RValidate\Iterators\ErrorsIterator', $e->getErrorsIterator());
    }
}
