<?php

namespace Validators;

use RValidate\Validators\Max;

class MaxTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate_number()
    {
        $validator = new Max(7);

        $result = $validator->validate(5);

        static::assertTrue($result);
    }
    
    public function testValidate_string()
    {
        $validator = new Max(14);

        $result = $validator->validate('success string');

        static::assertTrue($result);
    }
    
    public function testValidate_array()
    {
        $validator = new Max(3);

        $result = $validator->validate(['foo', 'bar']);

        static::assertTrue($result);
    }
    
    public static function testValidate_exception()
    {
        $validator = new Max(3);

        $result = $validator->validate(5);

        static::assertFalse($result);
    }
}
