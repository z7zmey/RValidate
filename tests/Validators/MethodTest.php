<?php

namespace Validators;

use RValidate\Validators\Method;

class MethodTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Method('example');

        $mock = $this->getMockBuilder('stdClass')
            ->setMethods(['example'])
            ->getMock();
        
        $result = $validator->validate($mock);

        static::assertTrue($result);
    }
    
    public static function testValidate_exception()
    {
        $validator = new Method('example');

        $result = $validator->validate(new \stdClass());

        static::assertFalse($result);
    }
}
