<?php

namespace Bankroll\Includes\Setup;

use Bankroll\Includes\Singleton;

class Menus
{
    use Singleton;

    protected function __construct()
    {
        $this->setupHooks();
    }

    protected function setupHooks()
    {
        add_action('init', [$this, 'registerMenus']);
    }

    public function registerMenus()
    {
        register_nav_menus([
            'primary-menu' => 'Primary Menu',
            'footer-1'     => 'First Footer Menu',
            'footer-2'     => 'Second Footer Menu',
            'footer-3'     => 'Third Footer Menu',
            'footer-4'     => 'Fourth Footer Menu',
        ]);
    }
}
