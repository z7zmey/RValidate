<?php

namespace Validators;

use RValidate\Validators\IsCallable;

class IsCallableTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new IsCallable();

        $result = $validator->validate(function(){});

        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new IsCallable();

        $validator->validate('string');
    }
}
