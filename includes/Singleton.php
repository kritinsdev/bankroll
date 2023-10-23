<?php

namespace Bankroll\Includes;

trait Singleton
{
    private static $instance = null;

    private function __construct()
    {
    }

    public static function get_instance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
