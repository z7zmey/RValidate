#RValidate

PHP library that help you validate structure of complex nested PHP arrays.

##Installation

The best way to install RValidate is using Composer:

```sh
$ composer require z7zmey/rvalidate
```

## Examples:

### Basic example

```php
use RValidate\Validator;
use RValidate\Iterators\Pattern;
use RValidate\Validators as V;
use RValidate\Filters as F;

$data = [
    'login' => 'Nick',
    'email' => 'nick@example.com',
    'password' => '******'
];

$pattern = new Pattern(
    new V\IsArray(),
    new V\keys(['login', 'email', 'password']),
    Pattern::get('login')->validate(new V\IsString(), new V\Min(3)),
    Pattern::get('email')->validate(new V\Email()),
    Pattern::get('password')->validate(new V\Regex('/[A-Za-z!#$%&*(),.]{6,}/'))
);

try {
    Validator::run($data, $pattern);
} catch (\RValidate\Exceptions\ValidateExceptions $e) {
    foreach ($e->getMessages() as $msg) {
        echo $msg['path'] . ' -> ' . $msg['message'] . "\n";
    }
}
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

$pattern = new Pattern(
    new V\IsArray(),
    new V\keys(['id_user', 'roles']),
    Pattern::get('id_user')->validate(new V\IsInteger()),
    Pattern::get('roles')->validate(
        new V\Keys(['admin', 'moderator', 'tester']),
        Pattern::all()->validate(new V\IsBoolean())
    )
);
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
    'alnum'    => 'alpha1'
];

$pattern = new Pattern(
    new V\IsArray(),
    Pattern::filter(new F\Key\Regex('/^String\d+$/'))->validate(new V\IsString()),
    Pattern::filter(new F\Key\Regex('/^Number\d+$/'))->validate(new V\IsInteger()),
    Pattern::filter(new F\Key\Regex('/^Alnum/i'))->validate(new V\Alnum(), new V\NotEmpty())
);
```