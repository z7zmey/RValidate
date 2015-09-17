<?php

namespace Validators;

use RValidate\Validators\Gt;

class GtTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Gt(7);

        $result = $validator->validate(10);

        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new Gt(7);

        $validator->validate(5);
    }
}
