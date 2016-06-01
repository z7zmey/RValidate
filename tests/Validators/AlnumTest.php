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
    
    public static function testValidate_exception()
    {
        $validator = new Alnum();

        $result = $validator->validate('wrong string!');

        static::assertFalse($result);
    }
}
