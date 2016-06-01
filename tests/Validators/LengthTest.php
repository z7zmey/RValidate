<?php

namespace Validators;

use RValidate\Validators\Length;

class LengthTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Length(14);

        $result = $validator->validate('success string');

        static::assertTrue($result);
    }
    
    public static function testValidate_exception()
    {
        $validator = new Length(14);

        $result = $validator->validate('wrong string');

        static::assertFalse($result);
    }
}
