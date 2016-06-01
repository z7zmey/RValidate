<?php

namespace Validators;

use RValidate\Validators\Ip;

class IpTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Ip();

        $result = $validator->validate('4.4.4.4');

        static::assertTrue($result);
    }
    
    public static function testValidate_exception()
    {
        $validator = new Ip();

        $result = $validator->validate('255.255.25566');

        static::assertFalse($result);
    }
}
