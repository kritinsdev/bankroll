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
        add_action('rest_api_init', [$this, 'importSlotRoute']);
    }

    public function importSlotRoute()
    {
        register_rest_route('bankroll/v1', '/import', [
            'methods' => 'GET',
            'callback' => 'importSlot',
        ]);
    }

    public function importSlot() {
        // Check if the request has a slot ID
        if (!isset($_GET['slot_id'])) {
            wp_send_json_error('Slot ID is missing', 400);
        }
    
        // Get the slot ID
        $slot_id = $_GET['slot_id'];
    
        // Here, you can fetch the slot data using the slot ID from your API and create a new custom post in WordPress
        // ...
    
        wp_send_json_success('Slot imported successfully');
    }
}
