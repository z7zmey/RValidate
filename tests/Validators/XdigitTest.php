<?php

namespace Validators;

use RValidate\Validators\Xdigit;

class XdigitTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Xdigit();

        $result = $validator->validate('ab12bc99');

        static::assertTrue($result);
    }

    public static function testValidate_exception()
    {
        $validator = new Xdigit();

        $result = $validator->validate('wrong');

        static::assertFalse($result);
    }
}
