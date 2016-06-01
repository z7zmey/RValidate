<?php

namespace Validators;

use RValidate\Validators\IsInteger;

class IsIntegerTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new IsInteger();

        $result = $validator->validate(11);

        static::assertTrue($result);
    }
    
    public static function testValidate_exception()
    {
        $validator = new IsInteger();

        $result = $validator->validate('string');

        static::assertFalse($result);
    }
}
