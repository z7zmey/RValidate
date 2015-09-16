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

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new Digit();

        $validator->validate('wrong string!');
    }
}
