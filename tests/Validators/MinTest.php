<?php

namespace Validators;

use RValidate\Validators\Min;

class MinTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate_number()
    {
        $validator = new Min(7);

        $result = $validator->validate(10);

        static::assertTrue($result);
    }
    
    public function testValidate_string()
    {
        $validator = new Min(7);

        $result = $validator->validate('success string');

        static::assertTrue($result);
    }
    
    public function testValidate_array()
    {
        $validator = new Min(2);

        $result = $validator->validate(['foo', 'bar']);

        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new Min(7);

        $validator->validate(5);
    }
}
