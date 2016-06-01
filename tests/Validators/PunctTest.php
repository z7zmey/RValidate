<?php

namespace Validators;

use RValidate\Validators\Punct;

class PunctTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Punct();

        $result = $validator->validate('*&$()!');

        static::assertTrue($result);
    }
    
    public static function testValidate_exception()
    {
        $validator = new Punct();

        $result = $validator->validate('Wrong string!');

        static::assertFalse($result);
    }
}
