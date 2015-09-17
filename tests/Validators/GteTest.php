<?php

namespace Validators;

use RValidate\Validators\Gte;

class GteTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Gte(10);

        $result = $validator->validate(10);

        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new Gte(7);

        $validator->validate(5);
    }
}
