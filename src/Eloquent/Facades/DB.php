<?php

namespace WeDevs\ORM\Eloquent\Facades;

use Illuminate\Support\Facades\Facade;
use WeDevs\ORM\Eloquent\Manager;

class DB extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return \WeDevs\ORM\Eloquent\Manager|string
     */
    protected static function getFacadeAccessor()
    {
        if (static::$app && static::$app->bound('db')) {
            return 'db';
        }

        return Manager::getInstance();
    }
}