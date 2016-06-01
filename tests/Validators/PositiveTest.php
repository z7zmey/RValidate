<?php

namespace Validators;

use RValidate\Validators\Positive;

class PositiveTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Positive();

        $result = $validator->validate('1');

        static::assertTrue($result);
    }
    
    public static function testValidate_exception()
    {
        $validator = new Positive();

        $result = $validator->validate(-5);

        static::assertFalse($result);
    }
}
