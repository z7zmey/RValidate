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

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new Json();

        $validator->validate('example');
    }
}
