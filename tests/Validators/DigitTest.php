<?php

namespace Validators;

use RValidate\Validators\Digit;

class DigitTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Digit();

        $result = $validator->validate('123');

        static::assertTrue($result);
    }
    
    public static function testValidate_exception()
    {
        $validator = new Digit();

        $result = $validator->validate('wrong string!');

        static::assertFalse($result);
    }
}
