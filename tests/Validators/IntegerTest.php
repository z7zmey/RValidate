<?php

namespace Validators;

use RValidate\Validators\Integer;

class IntegerTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Integer();

        $result = $validator->validate(11);

        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new Integer();

        $validator->validate('string');
    }
}
