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

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new Positive();

        $validator->validate(-5);
    }
}
