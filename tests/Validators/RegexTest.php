<?php

namespace Validators;

use RValidate\Validators\Regex;

class RegexTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Regex('/success/');

        $result = $validator->validate('success_string');

        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new Regex('/success/');

        $validator->validate('wrong_string');
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_notstring_exception()
    {
        $validator = new Regex('/success/');

        $validator->validate(['wrong_string']);
    }
}
