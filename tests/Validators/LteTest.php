<?php

namespace Validators;

use RValidate\Validators\Lte;

class LteTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Lte(10);

        $result = $validator->validate(10);

        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new Lte(5);

        $validator->validate(7);
    }
}
