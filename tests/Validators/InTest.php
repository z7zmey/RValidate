<?php

namespace Validators;

use RValidate\Validators\In;

class InTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new In(['foo', 'bar']);

        $result = $validator->validate('bar');

        static::assertTrue($result);
    }
    
    public static function testValidate_exception()
    {
        $validator = new In(['foo', 'bar']);

        $result = $validator->validate('baz');

        static::assertFalse($result);
    }
}
