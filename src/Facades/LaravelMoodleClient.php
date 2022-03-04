<?php

namespace Daniieljc\LaravelMoodle\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelMoodle extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'LaravelMoodle';
    }
}
