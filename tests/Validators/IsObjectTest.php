<?php

namespace Validators;

use RValidate\Validators\isObject;

class IsObjectTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new isObject();

        $result = $validator->validate(new \stdClass());

        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new isObject();

        $validator->validate('string');
    }
}
