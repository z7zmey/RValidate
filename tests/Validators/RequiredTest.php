<?php

namespace Validators;

use RValidate\Validators\Required;

class RequiredTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Required();

        $result = $validator->validate(true);

        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_null_exception()
    {
        $validator = new Required();

        $validator->validate(null);
    }
}
