<?php

namespace Validators;

use RValidate\Validators\Starts;

class StartsTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Starts('success');

        $result = $validator->validate('success_string');

        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new Starts('success');

        $validator->validate('wrong_string');
    }
}
