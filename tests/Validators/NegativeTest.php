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
    
    public static function testValidate_exception()
    {
        $validator = new Negative();

        $result = $validator->validate(0);

        static::assertFalse($result);
    }
}
