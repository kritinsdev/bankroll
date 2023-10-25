<?php

namespace Bankroll\Includes\Setup;

use Bankroll\Includes\Singleton;

class BankrollApi
{
    use Singleton;

    protected function __construct()
    {
        $this->setupHooks();
    }

    protected function setupHooks()
    {
        // add_action('rest_api_init', [$this, 'testRoute']);
    }

    public function testRoute()
    {
        // register_rest_route('bankroll/v1', '/import', [
        //     'methods' => 'GET',
        //     'callback' => [$this, 'testFunc'],
        // ]);
    }
}
