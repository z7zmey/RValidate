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
        'books_count' => 22567,
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
            'name' => null,
            'author' => '',
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
            'title' => 22
        ],
        [
            'type' => 'unvalidated'
        ],
    ],
];

$pattern = new Pattern(
    new V\Key('library'),
    new V\Custom(function($data) {return is_array($data);}, 'must be array'),
    new V\IsArray(),
    Pattern::get('library')->validate(
        Pattern::get('name')->validate(new V\IsString()),
        Pattern::get('address')->validate(new V\IsString()),
        Pattern::get('books_count')->validate(new V\IsInteger())
    ),
    Pattern::get('books')->validate(
        Pattern::filter(new F\Regex('/book_\d+/'))->validate(
            Pattern::get('name')->validate(new V\IsString()),
            Pattern::get('author')->validate(new V\NotEmpty(), new V\IsString())
        ),
        Pattern::filter(new F\Regex('/article_\d+/'))->validate(
            Pattern::get('title')->validate(new V\IsString()),
            Pattern::get('date')->validate(new V\IsString())
        )
    ),
    Pattern::get('data')->validate(
        Pattern::filter(new F\KeyEqual('type', 'article'))->validate(
            new V\Key('title'),
            Pattern::get('title')->validate(new V\IsString())
        ),
        Pattern::filter(new F\KeyEqual('type', 'book'))->validate(
            Pattern::get('name')->validate(new V\IsString())
        )
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
[][books][book_33][name] -> must be string
[][books][book_33][author] -> must not be empty
[][data][1] -> must contain key title
[][data][2][title] -> must be string
```