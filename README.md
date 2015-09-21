#RValidate

PHP library that help you validate structure of complex nested PHP arrays.

## Example:

```php
use RValidate\Validator;
use RValidate\Iterators\Pattern;
use RValidate\Validators as V;
use RValidate\Filters as F;

$data = [
    'library' => [
        'name' => 'Some library',
        'books_count' => '22567',
    ],
    'books' => [
        'book_1' => [
            'name' => 'Some book 1',
            'author' => 'unknown author',
        ],
        'book_2' => [
            'name' => 'Some book 2',
            'author' => 'unknown author',
        ],
        'book_33' => [
            'name' => '',
            'author' => null,
        ],
        'article_9' => [
            'title' => 'some article',
            'date' => '',
        ],
    ],
    'data' => [
        [
            'type' => 'book',
            'name' => 'some book'
        ],
        [
            'type' => 'article'
        ],
        [
            'type' => 'article',
            'title' => 47
        ],
        [
            'type' => 'unvalidated'
        ],
        'wrong value'
    ],
];

$bookPattern = new Pattern(
    new V\Keys(['name', 'author']),
    Pattern::get('name')->validate(new V\IsString()),
    Pattern::get('author')->validate(new V\NotEmpty(), new V\IsString())
);

$articlePattern = new Pattern(
    Pattern::get('title')->validate(new V\NotEmpty(), new V\IsString()),
    Pattern::get('author')->validate(new V\NotEmpty(), new V\IsString())
);

$dataFieldValidationFunc = function($data) {
    if (!is_array($data)) {
        return false;
    }
    foreach($data as $val) {
        if (
            !is_array($val) ||
            !array_key_exists('type', $val) ||
            !in_array($val['type'], ['book', 'article'], true)
        ) {
            return false;
        }
    }
    return true;
};

$pattern = new Pattern(
    new V\IsArray(),
    new V\keys(['library', 'books']),
    Pattern::get('library')->validate(
        Pattern::get('name')->validate(new V\IsString()),
        Pattern::get('address')->validate(new V\IsString()),
        Pattern::get('books_count')->validate(new V\IsInteger())
    ),
    Pattern::get('books')->validate(
        Pattern::filter(new F\Key\Regex('/book_\d+/'), $bookPattern),
        Pattern::filter(new F\Key\Regex('/article_\d+/'), $articlePattern)
    ),
    Pattern::get('data')->validate(
        new V\Custom($dataFieldValidationFunc, 'must contain only books and articles'),
        Pattern::filter(new F\Val\HasKey('type', 'book'), $bookPattern),
        Pattern::filter(new F\Val\HasKey('type', 'article'), $articlePattern)
    )
);

try {
    Validator::run($data, $pattern);

    echo 'success';
} catch (\RValidate\Exceptions\ValidateExceptions $e) {
    foreach ($e->getMessages() as $msg) {
        echo $msg['path'] . ' -> ' . $msg['message'] . "\n";
    }
}
```

Returns
```
[][library][books_count] -> must be integer
[][books][book_33][author] -> must not be empty
[][books][book_33][author] -> must be string
[][data] -> must contain only books and articles
[][data][0] -> must contain some keys
[][data][2][title] -> must be string
```