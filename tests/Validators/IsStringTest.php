<?php

namespace Validators;

use RValidate\Validators\IsString;

class IsStringTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new IsString();
        
        $result = $validator->validate('test string');
        
        static::assertTrue($result);
    }
    
    public static function testValidate_exception()
    {
        $validator = new IsString();

        $result = $validator->validate(22);

        static::assertFalse($result);
    }
}
