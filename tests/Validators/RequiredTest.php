<?php

namespace Validators;

use RValidate\Validators\Required;

class RequiredTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Required();

        $result = $validator->validate(true);

        static::assertTrue($result);
    }
    
    public static function testValidate_null_exception()
    {
        $validator = new Required();

        $result = $validator->validate(null);

        static::assertFalse($result);
    }
}
