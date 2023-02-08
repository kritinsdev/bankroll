<?php

namespace Bankroll\Core;

trait Singleton
{
    private static $instance = null;

    private function __construct()
    {

    }

    public static function get_instance()
    {
        if ( ! self::$instance) {
            // new self() will refer to the class that uses the trait
            self::$instance = new self();
        }

        return self::$instance;
    }

}
