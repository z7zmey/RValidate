<?php
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 14.09.15
 * Time: 19:26
 */

namespace Exceptions;

use RValidate\Exceptions\ValidateException;

class ValidateExceptionTest extends \PHPUnit_Framework_TestCase
{
    /* @var ValidateException */
    private static $e;
    
    public static function setUpBeforeClass()
    {
        self::$e = new ValidateException('message');
    }
    
    public function testSetPath()
    {
        $path = ['test'];
        self::$e->setPath($path);
        
        self::assertEquals($path, self::$e->getPath());
    }
}
