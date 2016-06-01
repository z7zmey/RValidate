<?php

namespace Validators;

use RValidate\Validators\Email;

class EmailTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Email();

        $result = $validator->validate('example@example.com');

        static::assertTrue($result);
    }
    
    public static function testValidate_exception()
    {
        $validator = new Email();

        $result = $validator->validate('@example.com');

        static::assertFalse($result);
    }
}
