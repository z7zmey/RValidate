<?php

namespace Validators;

use RValidate\Validators\Upper;

class UpperTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Upper();

        $result = $validator->validate('SUCCESS');

        static::assertTrue($result);
    }
    
    public static function testValidate_exception()
    {
        $validator = new Upper();

        $result = $validator->validate('Wrong');

        static::assertFalse($result);
    }
}
