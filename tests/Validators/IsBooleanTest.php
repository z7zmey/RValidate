<?php

namespace Validators;

use RValidate\Validators\IsBoolean;

class IsBooleanTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new IsBoolean();

        $result = $validator->validate(true);

        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new IsBoolean();

        $validator->validate('string');
    }
}
