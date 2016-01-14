===============
Getting Started
===============

Installation
------------

The best way to install RValidate is using Composer:

::

    $ composer require z7zmey/rvalidate

PHP 7.0+ are required.

Simple usage
------------

::

    require_once '/path/to/composer/autoload.php';

    use \RValidate\Validator;
    use \RValidate\Validators\IsString;
    
    try {
        Validator::run('Hello World', new IsString());
    } catch (\RValidate\Exceptions\ValidateExceptions $e) {
        // handle error
    }
