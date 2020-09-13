<?php

namespace moonrope\LaravelMoodle\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelMoodle extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravelmoodle';
    }
}
