<?php

namespace Validators;

use RValidate\Validators\Lt;

class LtTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Lt(10);

        $result = $validator->validate(7);

        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new Lt(5);

        $validator->validate(7);
    }
}
