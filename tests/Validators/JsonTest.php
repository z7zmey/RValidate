<?php

namespace Validators;

use RValidate\Validators\Json;

class JsonTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Json();

        $result = $validator->validate('{"foo": ["bar", "baz"]}');

        static::assertTrue($result);
    }

    public static function testValidate_exception()
    {
        $validator = new Json();

        $result = $validator->validate('example');

        static::assertFalse($result);
    }
}
