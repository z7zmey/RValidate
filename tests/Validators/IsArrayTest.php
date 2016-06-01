<?php

namespace Validators;

use RValidate\Validators\IsArray;

class IsArrayTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new IsArray();
        
        $result = $validator->validate([]);
        
        static::assertTrue($result);
    }
    
    public static function testValidate_exception()
    {
        $validator = new IsArray();

        $result = $validator->validate(22);

        static::assertFalse($result);
    }
}
