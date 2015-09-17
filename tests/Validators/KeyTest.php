<?php

namespace Validators;

use RValidate\Validators\Key;

class KeyTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Key('key');

        $result = $validator->validate(['key' => '']);

        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new Key('key');

        $validator->validate('string');
    }
}
