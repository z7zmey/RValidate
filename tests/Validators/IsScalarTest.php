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

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new IsScalar();

        $validator->validate([]);
    }
}
