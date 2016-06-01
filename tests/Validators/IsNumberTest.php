<?php

namespace Validators;

use RValidate\Validators\IsNumber;

class IsNumberTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new IsNumber();

        $result = $validator->validate(22);

        static::assertTrue($result);
    }
    
    public static function testValidate_exception()
    {
        $validator = new IsNumber();

        $result = $validator->validate('string');

        static::assertFalse($result);
    }
}
