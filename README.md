# Laravel Moodle Client

### This is a fork of [ozq/moodle-client](https://github.com/ozq/moodle-client)

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/daniieljc/laravel-moodle.svg?style=flat-square)](https://packagist.org/packages/daniieljc/laravel-moodle)

| **Laravel**  |  **laravel-modules** |
|---|---|
| ^5.5  | ^1.0  |

`daniieljc/laravel-moodle` is a Laravel package which created way to interact with moodle through api/webservice.

## In adaptation and Work in Progress

## Install
To install through Composer, by run the following command:
```
$ composer require daniieljc/laravel-moodle
```
The package will automatically register a service provider and alias.

Optionally, publish the package's configuration file by running:

``` bash
php artisan vendor:publish --provider="Daniieljc\LaravelMoodle\LaravelMoodleServiceProvider"
```

### Incorrect Documentation below

## Installation
The recommended way to install the library is through Composer:


## Usage

Create instance of moodle clients, e.g. REST client:
```php
$client = new RestClient();
```

If there is no build in needed services and entities, you can create it.  
Services must extend Service abstract class, entities (as DTO's) must extend Entity abstract class.

Also, you can use moodle client without service layer:
```php
$courses = $client->sendRequest('core_course_get_courses', $parameters);
```
