<?php

namespace Validators;

use RValidate\Validators\Instance;

class InstanceTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Instance('stdClass');

        $result = $validator->validate(new \stdClass());

        static::assertTrue($result);
    }
    
    public static function testValidate_exception()
    {
        $validator = new Instance('stdClass');

        $result = $validator->validate('wrong_string');

        static::assertFalse($result);
    }
}
