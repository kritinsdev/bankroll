<?php

namespace Bankroll\Includes;

class BankrollApi
{
    use Singleton;

    protected function __construct()
    {
        $this->setupHooks();
    }

    protected function setupHooks()
    {
        // add_action('rest_api_init', [$this, 'importSlotRoute']);
    }

    public function importSlotRoute()
    {
        // register_rest_route('bankroll/v1', '/import', [
        //     'methods' => 'GET',
        //     'callback' => [$this, 'importSlots'],
        // ]);
    }
}
