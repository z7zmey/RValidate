<?php

use RValidate\Validator;
use RValidate\Sub;
use RValidate\Filters\Key\Equal as Get;
use RValidate\Pattern;
use RValidate\Validators\IsString;
use RValidate\Validators\Required;
use RValidate\Validators\IsInteger;
use RValidate\Validators\Key;
use RValidate\Validators\Keys;


class ValidatorTest extends PHPUnit_Framework_TestCase
{
    public function test_scalar_success()
    {
        $data = 'string value';

        $pattern = new Pattern([new IsString()]);

        $result = Validator::run($data, $pattern);

        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateExceptions
     */
    public function test_scalar_exception()
    {
        $data = null;

        $pattern = new Pattern([new Required()]);

        Validator::run($data, $pattern);
    }

    public function test_array_success()
    {
        $data = [
            'key_1' => 1,
            'key_2' => 'string value',
        ];

        $pattern = new Pattern([
            new Keys(['key_1', 'key_2']),
            new Sub(new Get('key_1'), new Pattern([new IsInteger()])),
            new Sub(new Get('key_2'), new Pattern([new IsString()])),
        ]);

        $result = Validator::run($data, $pattern);

        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateExceptions
     */
    public function test_array_exception()
    {
        $data = [
            'key_1' => 1,
            'key_2' => 'string value',
        ];

        $pattern = new Pattern([
            new Keys(['key_1', 'key_2', 'key_3']),
            new Sub(new Get('key_1'), new Pattern([new IsInteger()])),
            new Sub(new Get('key_2'), new Pattern([new IsInteger()])),
        ]);

        Validator::run($data, $pattern);
    }

    public function test_nestedArray_success()
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
    public function test_nestedArray_exception()
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

    public function test_errorMessages()
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
