<?php

use Bankroll\Includes\Init;

define('BANKROLL_DIR', get_stylesheet_directory());
define('BANKROLL_DIR_URI', get_stylesheet_directory_uri());

require_once('vendor/autoload.php');

Init::get_instance();

function _ts($string)
{
    return $string;
}

function dump(mixed $value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
}

function update_post(int $id, \WP_Post $post, bool $update)
{
    if ($post->post_type === 'bonus') {
        $postId = $post->ID;
        $casinoId = get_field('cpt_bonus_for_casino', $postId);
        $bonusType = get_field('cpt_bonus_type', $postId)['label'];
        $firstLine = get_field('cpt_bonus_first_line', $postId);
        $secondLine = get_field('cpt_bonus_second_line', $postId);

        $title = get_the_title($casinoId);
        $post->post_title = "[{$title}] [{$bonusType}] : {$firstLine} {$secondLine}";

        remove_action('save_post', 'update_post');
        wp_update_post($post);

        add_action('save_post', 'update_post', 10, 3);
    }
}
add_action('save_post', 'update_post', 10, 3);
