<?php

namespace Validators;

use RValidate\Validators\String;

class StringTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new String();
        
        $result = $validator->validate('test string');
        
        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new String();

        $validator->validate(22);
    }
}
