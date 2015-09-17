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

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new Method('example');

        $validator->validate(new \stdClass());
    }
}
