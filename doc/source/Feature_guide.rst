===============
Getting Started
===============

Installation
------------

The best way to install RValidate is using Composer:

::

    $ composer require z7zmey/rvalidate

PHP 7.0+ are required.

Feature Guide
-------------

Simple usage
------------

::

    RValidate\Validator::run('Hello World', RValidate\Validators\IsString());

