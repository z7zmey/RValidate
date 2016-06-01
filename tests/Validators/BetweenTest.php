<?php

namespace Validators;

use RValidate\Validators\Between;

class BetweenTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Between(1,10);

        $result = $validator->validate(9);

        static::assertTrue($result);
    }
    
    public static function testValidate_exception()
    {
        $validator = new Between(7,10);

        $result = $validator->validate(5);

        static::assertFalse($result);
    }
}
