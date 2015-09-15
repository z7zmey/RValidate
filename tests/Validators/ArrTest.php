<?php

namespace Validators;

use RValidate\Validators\Arr;

class ArrTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Arr();
        
        $result = $validator->validate([]);
        
        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new Arr();

        $validator->validate(22);
    }
}
