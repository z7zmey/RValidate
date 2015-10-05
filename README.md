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

$pattern = new Pattern([
    new V\IsArray(),
    new V\keys(['login', 'email', 'password', 'name']),
    new Sub(new F\Key\Equal('login'), new Pattern([new V\IsString(), new V\Min(5)])),
    new Sub(new F\Key\Equal('email'), new Pattern([new V\Email()])),
    new Sub(new F\Key\Equal('password'), new Pattern([
        new V\Regex('/[A-Za-z[:punct:] ]{6,}/')
    ])),
]);

try {
    Validator::run($data, $pattern);
} catch (\RValidate\Exceptions\ValidateExceptions $e) {
    foreach ($e->getMessages() as $msg) {
        echo $msg['path'] . ' -> ' . $msg['message'] . "\n";
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

$pattern = new Pattern([
    new V\IsArray(),
    new V\keys(['id_user', 'roles']),
    new Sub(new F\Key\Equal('id_user'), new Pattern([new V\IsInteger()])),
    new Sub(new F\Key\Equal('roles'),   new Pattern([
        new V\Keys(['admin', 'moderator', 'tester']),
        new Sub(new F\Key\Equal('admin'),     new Pattern([new V\IsBoolean()])),
        new Sub(new F\Key\Equal('moderator'), new Pattern([new V\IsBoolean()])),
        new Sub(new F\Key\Equal('tester'),    new Pattern([new V\IsBoolean()])),
    ])),
]);
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

$pattern = new Pattern([
    new V\IsArray(),
    new Sub(new F\Key\Regex('/^String\d+$/'), new Pattern([new V\IsString()])),
    new Sub(new F\Key\Regex('/^Number\d+$/'), new Pattern([new V\IsInteger()])),
    new Sub(new F\Key\Regex('/^Alnum\d+$/'), new Pattern([
        new V\Alnum(), new V\NotEmpty()
    ])),
]);
```