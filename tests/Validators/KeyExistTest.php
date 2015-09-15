<?php

namespace Validators;

use RValidate\Validators\KeyExist;

class KeyExistTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new KeyExist('key');

        $result = $validator->validate(['key' => '']);

        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new KeyExist('key');

        $validator->validate('string');
    }
}
