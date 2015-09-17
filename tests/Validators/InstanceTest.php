<?php

namespace Validators;

use RValidate\Validators\Instance;

class InstanceTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Instance('stdClass');

        $result = $validator->validate(new \stdClass());

        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new Instance('stdClass');

        $validator->validate('wrong_string');
    }
}
