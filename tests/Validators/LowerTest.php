<?php

namespace Validators;

use RValidate\Validators\Lower;

class LowerTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Lower();

        $result = $validator->validate('success');

        static::assertTrue($result);
    }
    
    public static function testValidate_exception()
    {
        $validator = new Lower();

        $result = $validator->validate('Wrong string');

        static::assertFalse($result);
    }
}
