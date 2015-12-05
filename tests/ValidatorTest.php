<?php

use RValidate\Validator;
use RValidate\Sub;
use RValidate\Filters\Key\Equal as Get;
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

        $pattern = [new IsString()];

        $result = Validator::run($data, $pattern);

        static::assertEquals($data, $result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateExceptions
     */
    public function test_scalar_exception()
    {
        $data = null;

        $pattern = [new Required()];

        Validator::run($data, $pattern);
    }

    public function test_array_success()
    {
        $data = [
            'key_1' => 1,
            'key_2' => 'string value',
        ];

        $pattern = [
            new Keys(['key_1', 'key_2']),
            new Sub(new Get('key_1'), [new IsInteger()]),
            new Sub(new Get('key_2'), [new IsString()]),
        ];

        $result = Validator::run($data, $pattern);

        static::assertEquals($data, $result);
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

        $pattern = [
            new Keys(['key_1', 'key_2', 'key_3']),
            new Sub(new Get('key_1'), [new IsInteger()]),
            new Sub(new Get('key_2'), [new IsInteger()]),
        ];

        Validator::run($data, $pattern);
    }

    public function test_nestedArray_success()
    {
        $data = [
            'param_1' => [
                'param_2' => 'string value'
            ]
        ];

        $pattern = [
            new Sub(new Get('param_1'), [
                new Sub(new Get('param_2'), [new IsString()])
            ])
        ];

        $result = Validator::run($data, $pattern);

        static::assertEquals($data, $result);
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

        $pattern = [
            new Sub(new Get('param_1'), [
                new Sub(new Get('param_2'), [new IsInteger()])
            ])
        ];

        $result = Validator::run($data, $pattern);

        static::assertEquals($data, $result);
    }

    public function test_short_success()
    {
        $data = ['param_1' => 'string value'];
        $pattern = new Sub('param_1', new IsString());

        $result = Validator::run($data, $pattern);
        static::assertEquals($data, $result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateExceptions
     */
    public function test_short_exception()
    {
        Validator::run('string', new IsInteger());
    }

    public function test_errorMessages()
    {
        $data = [
            'param_1' => [
                'param_2' => 'string value'
            ]
        ];
        
        $pattern = [
            new Key('Param_2'),
            new Sub(new Get('param_1'), [
                new Sub(new Get('param_2'), [new IsInteger()])
            ])
        ];

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
    
    public function test_returnOnlyValidated_success()
    {

        $data = [
            'param_1' => [
                'param_2' => 'string value',
                'filtered_val' => 25,
            ],
            'some' => 'filtered value',
        ];
        
        $expected = [
            'param_1' => [
                'param_2' => 'string value'
            ]
        ];

        $pattern = [
            new Sub(new Get('param_1'), [
                new Sub(new Get('param_2'), [new IsString()])
            ])
        ];

        $result = Validator::run($data, $pattern);

        static::assertEquals($expected, $result);
    }
}
