<?php

namespace Validators;

use RValidate\Validators\Gte;

class GteTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Gte(10);

        $result = $validator->validate(10);

        static::assertTrue($result);
    }
    
    public static function testValidate_exception()
    {
        $validator = new Gte(7);

        $result = $validator->validate(5);

        static::assertFalse($result);
    }
}
