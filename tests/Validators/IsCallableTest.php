<?php

namespace Validators;

use RValidate\Validators\IsCallable;

class IsCallableTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new IsCallable();

        $result = $validator->validate(function(){});

        static::assertTrue($result);
    }
    
    public static function testValidate_exception()
    {
        $validator = new IsCallable();

        $result = $validator->validate('string');

        static::assertFalse($result);
    }
}
