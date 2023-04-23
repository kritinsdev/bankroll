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
// add_action('init', 'renameTerms');

function renameTerms()
{
    $taxonomies = ['provider', 'theme', 'feature']; // replace with your actual taxonomy slug

    foreach($taxonomies as $taxonomy) {
        $terms = get_terms( array(
            'taxonomy' => $taxonomy,
            'hide_empty' => false,
        ) );
    
        foreach ( $terms as $term ) {
            // check if the term name matches the pattern
            if ( preg_match( '/^([\w-]+)$/', $term->name, $matches ) ) {
                // create the new term name
                $words = explode( '-', $matches[1] );
                $new_name = '';
                foreach ( $words as $word ) {
                    $new_name .= ucfirst( $word ) . ' ';
                }
                $new_name = rtrim( $new_name );
                // update the term name
                wp_update_term( $term->term_id, $taxonomy, array(
                    'name' => $new_name,
                ) );
            }
        }
    }
}