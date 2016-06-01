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
    
    public static function testValidate_exception()
    {
        $validator = new Regex('/success/');

        $result = $validator->validate('wrong_string');

        static::assertFalse($result);
    }
    
    public static function testValidate_notstring_exception()
    {
        $validator = new Regex('/success/');

        $result = $validator->validate(['wrong_string']);

        static::assertFalse($result);
    }
}
