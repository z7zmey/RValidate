<?php

namespace Validators;

use RValidate\Validators as V;

class StringTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new V\String();
        
        $result = $validator->validate('test string');
        
        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new V\String();

        $validator->validate(22);
    }
}
