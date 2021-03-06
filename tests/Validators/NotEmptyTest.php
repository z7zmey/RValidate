<?php

namespace Validators;

use RValidate\Validators\NotEmpty;

class NotEmptyTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new NotEmpty();

        $result = $validator->validate('success');

        static::assertTrue($result);
    }
    
    public static function testValidate_exception()
    {
        $validator = new NotEmpty();

        $result = $validator->validate('      ');

        static::assertFalse($result);
    }
}
