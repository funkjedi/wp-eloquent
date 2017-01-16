<?php

namespace WeDevs\ORM\Eloquent;

use WeDevs\ORM\Eloquent\Facades\DB;

class Database
{
    /**
     * Initializes the Database class
     *
     * @return \WeDevs\ORM\Eloquent\Manager
     */
    public static function instance()
    {
        return DB::connection();
    }
}
