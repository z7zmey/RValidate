<?php

namespace Validators;

use RValidate\Validators\IsObject;

class IsObjectTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new IsObject();

        $result = $validator->validate(new \stdClass());

        static::assertTrue($result);
    }
    
    public static function testValidate_exception()
    {
        $validator = new IsObject();

        $result = $validator->validate('string');

        static::assertFalse($result);
    }
}
