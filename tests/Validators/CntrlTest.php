<?php

namespace Validators;

use RValidate\Validators\Cntrl;

class CntrlTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Cntrl();

        $result = $validator->validate("\n\t");

        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new Cntrl();

        $validator->validate('wrong string!');
    }
}
