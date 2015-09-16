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

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new In(['foo', 'bar']);

        $validator->validate('baz');
    }
}
