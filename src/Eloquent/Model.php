<?php

namespace WeDevs\ORM\Eloquent;

use Illuminate\Database\Eloquent\Model as Eloquent;
use WeDevs\ORM\Eloquent\Facades\DB;

abstract class Model extends Eloquent
{
    /**
     * Indicates whether the WP table prefix should be used for the model.
     *
     * @var boolean
     */
    protected $tablePrefix = true;

    /**
     * Get the table associated with the model.
     *
     * @return string
     */
    public function getTable()
    {
        if (isset($this->table)) return $this->table;

        $table = parent::getTable();

        if ($this->tablePrefix) {
            $table = $this->getConnection()->getWpdb()->prefix . $table;
        }

        return $table;
    }

    /**
     * Resolve a connection instance.
     *
     * @param  string  $connection
     * @return \Illuminate\Database\Connection
     */
    public static function resolveConnection($connection = null)
    {
        // If a resolver hasn't been configured then setup
        // up the capsule instance and resolve connection with it
        if (static::$resolver === null) {
            DB::connection();
        }

        return parent::resolveConnection($connection);
    }
}