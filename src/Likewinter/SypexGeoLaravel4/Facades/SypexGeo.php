<?php namespace Likewinter\SypexGeoLaravel4\Facades;

use Illuminate\Support\Facades\Facade;

class SypexGeo extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'sypexgeo';
    }
} 