<?php

namespace Validators;

use RValidate\Validators\Prnt;

class PrntTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Prnt();

        $result = $validator->validate('success string');

        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new Prnt();

        $validator->validate("Wrong string\n");
    }
}
