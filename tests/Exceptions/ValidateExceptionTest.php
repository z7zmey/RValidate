<?php

namespace Exceptions;

use RValidate\Exceptions\ValidateException;

class ValidateExceptionTest extends \PHPUnit_Framework_TestCase
{
    public function testSetErrors()
    {
        $e = new ValidateException('message');
        $errors = [[
            'path' => [1,'test'],
            'message' => 'some message',
        ]];
        $e->setErrors($errors);

        self::assertEquals($errors, $e->getErrors());
    }

    public function testAddError()
    {
        $e = new ValidateException('message');
        
        $error = [
            'path' => [1,'test'],
            'message' => 'some message',
        ];
        $errors = [$error];
        
        $e->addError($error);

        self::assertEquals($errors, $e->getErrors());
    }
}
