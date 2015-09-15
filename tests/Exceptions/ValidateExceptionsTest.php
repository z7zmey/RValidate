<?php

namespace Exceptions;

use RValidate\Exceptions\ValidateException;
use RValidate\Exceptions\ValidateExceptions;

class ValidateExceptionsTest extends \PHPUnit_Framework_TestCase
{
    /* @var ValidateExceptions */
    private static $exceptions;
    
    /* @var ValidateException */
    private static $exception;

    public static function setUpBeforeClass()
    {
        self::$exceptions = new ValidateExceptions();
        self::$exception = new ValidateException('message');
        self::$exception->setPath(['test']);
    }
    
    public function testAdd()
    {
        self::assertEmpty(self::$exceptions->add(self::$exception));
    }
    
    public function testGetExceptions()
    {
        self::assertEquals([self::$exception], self::$exceptions->getExceptions());
    }

    public function testGetMessages()
    {
        $expected = [
            [
                'path' => '[test]',
                'message' => 'message'
            ]
        ];
        
        self::assertEquals($expected, self::$exceptions->getMessages());
    }
}
