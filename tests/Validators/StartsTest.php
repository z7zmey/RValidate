<?php

namespace Validators;

use RValidate\Validators\Starts;

class StartsTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Starts('success');

        $result = $validator->validate('success_string');

        static::assertTrue($result);
    }
    
    public static function testValidate_exception()
    {
        $validator = new Starts('success');

        $result = $validator->validate('wrong_string');

        static::assertFalse($result);
    }
}
