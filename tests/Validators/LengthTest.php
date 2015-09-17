<?php

namespace Validators;

use RValidate\Validators\Length;

class LengthTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Length(14);

        $result = $validator->validate('success string');

        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new Length(14);

        $validator->validate('wrong string');
    }
}
