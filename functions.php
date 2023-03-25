<?php

use Bankroll\Includes\Init;

define('BANKROLL_DIR', get_stylesheet_directory());
define('BANKROLL_DIR_URI', get_stylesheet_directory_uri());

require_once('vendor/autoload.php');

Init::get_instance();

// add_action('init', 'createSlot');

function createSlot()
{
    $slotData = BANKROLL_DIR . '/scraper/slot.json';

    $jsonData = file_get_contents($slotData);
    $data = json_decode($jsonData, true);

    foreach ($data as $slot) {
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
        foreach($slot['providers'] as $provider) {
            $providersArray[] = $provider;
        }

        $featuresArray = [];
        foreach($slot['features'] as $feature) {
            $featuresArray[] = $feature;
        }

        $themesArray = [];
        foreach($slot['themes'] as $theme){
            $themesArray[] = $theme;
        }

        wp_set_object_terms($id, $featuresArray, 'feature');
        wp_set_object_terms($id, $themesArray, 'theme');
        wp_set_object_terms($id, $providersArray, 'provider');
    }
}