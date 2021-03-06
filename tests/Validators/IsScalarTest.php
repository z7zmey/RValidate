<?php

namespace Validators;

use RValidate\Validators\IsScalar;

class IsScalarTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new IsScalar();

        $result = $validator->validate(22);

        static::assertTrue($result);
    }

    public static function testValidate_exception()
    {
        $validator = new IsScalar();

        $result = $validator->validate([]);

        static::assertFalse($result);
    }
}
