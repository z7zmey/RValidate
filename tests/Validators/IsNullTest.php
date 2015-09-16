<?php

namespace Validators;

use RValidate\Validators\IsNull;

class IsNullTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new IsNull();

        $result = $validator->validate(null);

        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new IsNull();

        $validator->validate(1);
    }
}
