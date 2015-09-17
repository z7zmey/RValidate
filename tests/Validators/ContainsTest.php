<?php

namespace Validators;

use RValidate\Validators\Contains;

class ContainsTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Contains('success');

        $result = $validator->validate('success_string');

        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new Contains('success');

        $validator->validate('wrong_string');
    }
}
