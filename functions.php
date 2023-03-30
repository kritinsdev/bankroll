<?php

use Bankroll\Includes\Init;

define('BANKROLL_DIR', get_stylesheet_directory());
define('BANKROLL_DIR_URI', get_stylesheet_directory_uri());

require_once('vendor/autoload.php');

Init::get_instance();

function _ts($string) {
    return $string;
}

// add_action('init', 'createSlots');

function createSlots()
{
    $slotData = BANKROLL_DIR . '/scraper/slot.json';

    $jsonData = file_get_contents($slotData);
    $data = json_decode($jsonData, true);

    foreach ($data as $slot) {
        $page = get_page_by_title($slot['slotName'], OBJECT, 'slot');

        if (!empty($page->ID) && isset($page->ID)) {
            continue;
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
        foreach($slot['slotProviders'] as $slug => $provider) {
            $providersArray[] = $provider;
        }

        $featuresArray = [];
        foreach($slot['slotFeatures'] as $slug => $feature) {
            $featuresArray[] = $feature;
        }

        $themesArray = [];
        foreach($slot['slotThemes'] as $slug => $theme){
            $themesArray[] = $theme;
        }

        wp_set_object_terms($id, $featuresArray, 'feature');
        wp_set_object_terms($id, $themesArray, 'theme');
        wp_set_object_terms($id, $providersArray, 'provider');
    }
}