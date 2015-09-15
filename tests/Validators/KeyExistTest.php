<?php
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 14.09.15
 * Time: 18:39
 */

namespace Validators;

use RValidate\Validators as V;

class KeyExistTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new V\KeyExist('key');

        $result = $validator->validate(['key' => '']);

        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new V\KeyExist('key');

        $validator->validate('string');
    }
}
