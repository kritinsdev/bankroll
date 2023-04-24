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

    public function importSlot() {
        // Check if the request has a slot ID
        if (!isset($_GET['slot_id'])) {
            wp_send_json_error('Slot ID is missing', 400);
        }
    
        $slot_id = $_GET['slot_id'];
    
        $api_url = 'http://localhost:3000/api/v1/slots/id/' . $slot_id;
    
        $response = wp_remote_get($api_url);
    
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
        $page = get_page_by_title($slot['name'], OBJECT, 'slot');

        if (!empty($page->ID) && isset($page->ID)) {
            return;
        }

        $postData = [
            'post_title' => $slot['name'],
            'post_status' => 'publish',
            'post_type' => 'slot'
        ];

        $id = wp_insert_post($postData);

        if (is_wp_error($id)) {
            wp_die('failed to add slot');
        }

        update_field('slot_rtp', $slot['rtp'], $id);
        update_field('slot_min_bet', $slot['minBet'], $id);
        update_field('slot_max_bet', $slot['maxBet'], $id);
        update_field('slot_max_multiplier', $slot['maxMultiplier'], $id);

        $providersArray = [];
        foreach ($slot['providers'] as $provider) {
            $providersArray[] = $provider;
        }

        $featuresArray = [];
        foreach ($slot['features'] as $feature) {
            $featuresArray[] = $feature;
        }

        $themesArray = [];
        foreach ($slot['themes'] as $theme) {
            $themesArray[] = $theme;
        }

        wp_set_object_terms($id, $featuresArray, 'feature');
        wp_set_object_terms($id, $themesArray, 'theme');
        wp_set_object_terms($id, $providersArray, 'provider');
    }
}
