#RValidate

Library for the validation nested arrays with indicating the location and type of each pattern mismatch.

##Installation

The best way to install RValidate is using Composer:

```sh
$ composer require z7zmey/rvalidate
```

## Examples:

### Basic example

```php
use RValidate\Validator;
use RValidate\Sub;
use RValidate\Pattern;
use RValidate\Validators as V;
use RValidate\Filters as F;

$data = [
    'login' => 'Nick',
    'email' => 'nick@example.com',
    'password' => '*****'
];

$pattern = [
    new V\IsArray(),
    new V\keys(['login', 'email', 'password', 'name']),
    new Sub('login', [new V\IsString(), new V\Min(5)]),
    new Sub('email', new V\Email()),
    new Sub('password', new V\Regex('/[A-Za-z[:punct:] ]{6,}/')),
];

try {
    $result = Validator::run($data, $pattern);
} catch (\RValidate\Exceptions\ValidateExceptions $e) {
    foreach ($e->getMessages() as $err) {
        echo $err['path'] . ' -> ' . $err['message'] . "\n";
    }
}
```

#### output
```
[] -> must contain keys [login, email, password, name]
[][login] -> must be minimal 5
[][password] -> must match /[A-Za-z[:punct:] ]{6,}/
```

### Nested example:

```php
$data = [
    'id_user' => 1011,
    'roles' => [
        'admin' => false,
        'moderator' => true,
        'tester' => false
    ]
];

$pattern = [
    new V\IsArray(),
    new V\keys(['id_user', 'roles']),
    new Sub(new F\Key\Equal('id_user'), [new V\IsInteger()]),
    new Sub(new F\Key\Equal('roles'),   [
        new V\Keys(['admin', 'moderator', 'tester']),
        new Sub(new F\Key\Equal('admin'),     [new V\IsBoolean()]),
        new Sub(new F\Key\Equal('moderator'), [new V\IsBoolean()]),
        new Sub(new F\Key\Equal('tester'),    [new V\IsBoolean()]),
    ]),
];
```

### Filter example:

```php
$data = [
    'String1'  => 'some string',
    'String2'  => 'some string',
    'String3'  => '',
    'Number1'  => 1,
    'Number2'  => 2,
    'Number44' => 44,
    'Alnum1'   => 'alpha1'
];

$pattern = [
    new V\IsArray(),
    new Sub(new F\Key\Regex('/^String\d+$/'), [new V\IsString()]),
    new Sub(new F\Key\Regex('/^Number\d+$/'), [new V\IsInteger()]),
    new Sub(new F\Key\Regex('/^Alnum\d+$/'), [new V\Alnum(), new V\NotEmpty()]),
];
```