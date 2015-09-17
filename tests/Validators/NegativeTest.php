<?php

namespace Validators;

use RValidate\Validators\Negative;

class NegativeTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Negative();

        $result = $validator->validate('-5');

        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new Negative();

        $validator->validate(0);
    }
}
