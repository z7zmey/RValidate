<?php

namespace Validators;

use RValidate\Validators\Space;

class SpaceTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Space();

        $result = $validator->validate("\n\r\t ");

        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new Space();

        $validator->validate("Wrong string \n\r\t");
    }
}
