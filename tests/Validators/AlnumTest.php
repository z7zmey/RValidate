<?php

namespace Validators;

use RValidate\Validators\Alnum;

class AlnumTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Alnum();

        $result = $validator->validate('success1234');

        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new Alnum();

        $validator->validate('wrong string!');
    }
}
