<?php

use RValidate\Validator;
use RValidate\Sub;
use RValidate\Filters\Key\Equal as Get;
use RValidate\Pattern;
use RValidate\Validators\IsString;
use RValidate\Validators\Required;
use RValidate\Validators\IsInteger;
use RValidate\Validators\Key;


class ValidatorTest extends PHPUnit_Framework_TestCase
{
    public function testValidate_success()
    {
        $data = 'string value';

        $pattern = new Pattern([new IsString()]);

        $result = Validator::run($data, $pattern);

        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateExceptions
     */
    public function testValidate_error()
    {
        $data = null;

        $pattern = new Pattern([new Required()]);

        Validator::run($data, $pattern);
    }

    public function testValidate_nested_success()
    {
        $data = [
            'param_1' => [
                'param_2' => 'string value'
            ]
        ];

        $pattern = new Pattern([
            new Sub(new Get('param_1'), new Pattern([
                new Sub(new Get('param_2'), new Pattern([new IsString()]))
            ]))
        ]);

        $result = Validator::run($data, $pattern);

        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateExceptions
     */
    public function testValidate_nested_error()
    {
        $data = [
            'param_1' => [
                'param_2' => 'string value'
            ]
        ];

        $pattern = new Pattern([
            new Sub(new Get('param_1'), new Pattern([
                new Sub(new Get('param_2'), new Pattern([new IsInteger()]))
            ]))
        ]);

        $result = Validator::run($data, $pattern);

        static::assertTrue($result);
    }

    public function testValidate_errorMessages()
    {
        $data = [
            'param_1' => [
                'param_2' => 'string value'
            ]
        ];
        
        $pattern = new Pattern([
            new Key('Param_2'),
            new Sub(new Get('param_1'), new Pattern([
                new Sub(new Get('param_2'), new Pattern([new IsInteger()]))
            ]))
        ]);

        $expected = [
            [
                'path' => '[]',
                'message' => 'must contain key Param_2'
            ],
            [
                'path' => '[][param_1][param_2]',
                'message' => 'must be integer'
            ]
        ];

        try {
            Validator::run($data, $pattern);
        } catch (\RValidate\Exceptions\ValidateExceptions $e) {
            $messagesArray = $e->getMessages();

            static::assertEquals($expected, $messagesArray);
        }
    }
}
