<?php

namespace Validators;

use RValidate\Validators\Ends;

class EndsTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Ends('success');

        $result = $validator->validate('string_success');

        static::assertTrue($result);
    }
    
    public static function testValidate_exception()
    {
        $validator = new Ends('success');

        $result = $validator->validate('string_wrong');

        static::assertFalse($result);
    }
}
