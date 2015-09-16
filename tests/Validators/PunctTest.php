<?php

namespace Validators;

use RValidate\Validators\Punct;

class PunctTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Punct();

        $result = $validator->validate('*&$()!');

        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new Punct();

        $validator->validate('Wrong string!');
    }
}
