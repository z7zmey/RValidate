<?php

namespace Validators;

use RValidate\Validators\Alpha;

class AlphaTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Alpha();

        $result = $validator->validate('Success');

        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new Alpha();

        $validator->validate('wrong string!');
    }
}
