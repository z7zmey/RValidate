<?php

namespace Validators;

use RValidate\Validators\Lte;

class LteTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Lte(10);

        $result = $validator->validate(10);

        static::assertTrue($result);
    }
    
    public static function testValidate_exception()
    {
        $validator = new Lte(5);

        $result = $validator->validate(7);

        static::assertFalse($result);
    }
}
