<?php

namespace Validators;

use RValidate\Validators\Keys;

class KeysTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Keys(['foo', 'bar', 'bar']);

        $result = $validator->validate(['foo' => 'foo', 'bar' => 'bar']);

        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new Keys(['foo', 'bar', 'baz']);

        $validator->validate(['foo' => 'foo', 'bar' => 'bar']);
    }
}
