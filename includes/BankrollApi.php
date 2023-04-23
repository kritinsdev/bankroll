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
            'callback' => [$this, 'importSlot'],
        ]);
    }

    function importSlot() {
        // Check if the request has a slot ID
        if (!isset($_GET['slot_id'])) {
            wp_send_json_error('Slot ID is missing', 400);
        }
    
        // Get the slot ID
        $slot_id = $_GET['slot_id'];
    
        // Define your external API URL
        $api_url = 'http://localhost:3000/api/v1/slots/id/' . $slot_id;
    
        // Fetch the slot data from your external API
        $response = wp_remote_get($api_url);
    
        // Check if the API request was successful
        if (is_wp_error($response)) {
            wp_send_json_error('Error fetching data from the external API', 500);
        }
    
        // Decode the JSON data
        $data = json_decode(wp_remote_retrieve_body($response), true);
    
        $this->createSlot($data);
    
        wp_send_json_success('Slot imported successfully');
    }

    public function createSlot($slot)
    {
        $page = get_page_by_title($slot['slotName'], OBJECT, 'slot');

        if (!empty($page->ID) && isset($page->ID)) {
            return;
        }

        $postData = [
            'post_title' => $slot['slotName'],
            'post_status' => 'publish',
            'post_type' => 'slot'
        ];

        $id = wp_insert_post($postData);

        if (is_wp_error($id)) {
            wp_die('failed to add slot');
        }

        update_field('slot_rtp', $slot['slotRtp'], $id);
        update_field('slot_min_bet', $slot['slotMinBet'], $id);
        update_field('slot_max_bet', $slot['slotMaxBet'], $id);
        update_field('slot_max_multiplier', $slot['slotMaxMultiplier'], $id);

        $providersArray = [];
        foreach ($slot['slotProviders'] as $provider) {
            $providersArray[] = $provider;
        }

        $featuresArray = [];
        foreach ($slot['slotFeatures'] as $feature) {
            $featuresArray[] = $feature;
        }

        $themesArray = [];
        foreach ($slot['slotThemes'] as $theme) {
            $themesArray[] = $theme;
        }

        wp_set_object_terms($id, $featuresArray, 'feature');
        wp_set_object_terms($id, $themesArray, 'theme');
        wp_set_object_terms($id, $providersArray, 'provider');
    }
}
