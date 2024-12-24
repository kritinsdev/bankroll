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
            'primary_menu' => 'Primary Menu',
            'footer_1'     => 'First Footer Menu',
            'footer_2'     => 'Second Footer Menu',
            'footer_3'     => 'Third Footer Menu',
            'footer_4'     => 'Fourth Footer Menu',
        ]);
    }
}
