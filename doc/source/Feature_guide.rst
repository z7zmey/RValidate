=============
Feature Guide
=============

Several rules
-------------

::

    use \RValidate\Validator;
    use \RValidate\Validators as V;
    
    $pattern = [
        new V\IsString(),
        new V\Min(3),
        new V\Max(11),
    ];
    
    Validator::run('Hello World', $pattern);

Array validation
----------------

::

    use RValidate\Validator;
    use RValidate\Sub;
    use RValidate\Validators as V;
    
    $data = [
        'Name' => 'Alex',
        'Email' => 'alex@examle.com',
        'Age' => 28,
    ];
    
    $pattern = [
        // top level validators
        new V\IsArray(),
        
        // array fields validators
        new Sub('Email', new V\Email()),
        new Sub('Age', new V\IsInteger()),
        new Sub('Name', [new V\IsString(), new V\Min(3)]),
    ];
    
    Validator::run($data, $pattern);

Nested validation
-----------------

::

    use RValidate\Validator;
    use RValidate\Sub;
    use RValidate\Validators as V;
    
    $data = [
        'Alex' => [
            'id' => 23,
            'Email' => 'alex@examle.com',
            'Age' => 28,
        ],
        'Pit' => [
            'id' => 2,
            'Email' => 'pit@examle.com',
            'Age' => 17,
        ],
    ];
    
    $user_pattern = [
        new V\IsArray(),
        new Sub('Email', new V\Email()),
        new Sub('Age', new V\IsInteger()),
        new Sub('id', new V\IsInteger()),
    ];
    
    $pattern = [
        // top level validators
        new V\IsArray(),
        new V\NotEmpty(),
    
        // array fields validators
        new Sub('Alex', $user_pattern),
        new Sub('Pit', $user_pattern),
        
    ];
    
    Validator::run($data, $pattern);

Filters usage
-------------

::

    use RValidate\Validator;
    use RValidate\Sub;
    use RValidate\Validators as V;
    use RValidate\Filters as F;
    
    $users = [
        'user_23' => [
            'id' => 23,
            'Name' => 'Alex',
            'Email' => 'alex@examle.com',
            'Age' => 28,
        ],
        'user_2' => [
            'id' => 2,
            'Name' => 'Pit',
            'Email' => 'pit@examle.com',
            'Age' => 17,
        ],
        'some_other_field' => 'no validation'
    ];
    
    $user_pattern = [
        new V\IsArray(),
        new Sub('id', new V\IsInteger()),
        new Sub('Name', new V\IsString()),
        new Sub('Email', new V\Email()),
        new Sub('Age', new V\IsInteger()),
    ];
    
    $pattern = [
        new V\IsArray(),
        new V\NotEmpty(),
        
        new Sub(new F\Key\Regex('/^user_\d*$/'), $user_pattern),
    ];
    
    Validator::run($users, $pattern);

