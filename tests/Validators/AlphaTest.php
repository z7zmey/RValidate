<?php

namespace Validators;

use RValidate\Validators\Alpha;

class AlphaTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Alpha();

        $result = $validator->validate('Success');

        static::assertTrue($result);
    }
    
    public static function testValidate_exception()
    {
        $validator = new Alpha();

        $result = $validator->validate('wrong string!');

        static::assertFalse($result);
    }
}
