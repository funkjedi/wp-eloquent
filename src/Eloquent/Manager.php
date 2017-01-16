<?php

namespace WeDevs\ORM\Eloquent;

use Illuminate\Database\Capsule\Manager as CapsuleManager;
use Illuminate\Database\DatabaseServiceProvider;
use Illuminate\Events\Dispatcher;
use Illuminate\Events\EventServiceProvider;
use Illuminate\Support\Container;
use Illuminate\Support\Facades\Facade;

class Manager extends CapsuleManager
{
    /**
     * Get a global instance of the capsule manager.
     *
     * @param \Illuminate\Support\Container|null $container
     * @return \WeDevs\ORM\Eloquent\Manager
     */
    public static function getInstance()
    {
        $container = Facade::getFacadeApplication();

        if ($container === null) {
            Facade::setFacadeApplication($container = new Container);
        }

        if ($container->bound('db')) {
            return $container['db'];
        }

        if (!$container->bound('events')) {
            $container->instance('events', new Dispatcher($container));
        }

        $container->instance('db', new self($container));

        $container['db']->setAsGlobal();
        $container['db']->bootEloquent();

        return $container['db'];
    }

    /**
     * Build the database manager instance.
     *
     * @return void
     */
    protected function setupManager()
    {
        parent::setupManager();

        $this->manager->extend('wpdb', function($config, $name){
            return new Connection((new Connector)->connect($config, $name));
        });

        $this->addConnection(['driver' => 'wpdb'], 'default');
    }
}