<?php

namespace Validators;

use RValidate\Validators\Equal;

class EqualTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Equal('success string', true);

        $result = $validator->validate('success string');

        static::assertTrue($result);
    }
    
    public function testValidate_notStrict()
    {
        $validator = new Equal(2);

        $result = $validator->validate('2');

        static::assertFalse($result);
    }
    
    public static function testValidate_exception()
    {
        $validator = new Equal('2', true);

        $result = $validator->validate(2);

        static::assertFalse($result);
    }
}
