<?php

namespace Validators;

use RValidate\Validators\IsFloat;

class IsFloatTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new IsFloat();

        $result = $validator->validate(1.);

        static::assertTrue($result);
    }
    
    public static function testValidate_exception()
    {
        $validator = new IsFloat();

        $result = $validator->validate(1);

        static::assertFalse($result);
    }
}
