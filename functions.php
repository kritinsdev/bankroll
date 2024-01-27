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
    print_r($value);
    echo "</pre>";
}

function createBonusPostTitle(int $id, \WP_Post $post, bool $update)
{
    if ($post->post_type === 'bonus') {
        $postId = $post->ID;
        $casinoId = get_field('cpt_bonus_for_casino', $postId);

        $bonusType = !empty(get_field('cpt_bonus_type', $postId)['label']) ? get_field('cpt_bonus_type', $postId)['label'] : '';
        $firstLine = get_field('cpt_bonus_first_line', $postId);
        $secondLine = get_field('cpt_bonus_second_line', $postId);

        $title = get_the_title($casinoId[0]);
        $post->post_title = "[{$title}] [{$bonusType}] : {$firstLine} {$secondLine}";

        remove_action('save_post', 'createBonusPostTitle');
        wp_update_post($post);
        add_action('save_post', 'createBonusPostTitle', 10, 3);
    }
}
add_action('save_post', 'createBonusPostTitle', 10, 3);


function addCustomColumnForBonus($columns)
{
    unset($columns['date']);
    $columns['bonus_casino'] = 'Casino';
    $columns['bonus_type'] = 'Bonus Type';
    $columns['bonus_start_date'] = 'Bonus Start Date';
    $columns['bonus_end_date'] = 'Bonus End Date';

    return $columns;
}
add_filter('manage_bonus_posts_columns', 'addCustomColumnForBonus');

function customBonusColumnData($column, $postId)
{
    $casinoId = get_field('cpt_bonus_for_casino', $postId)[0];
    $bonusType = !empty(get_field('cpt_bonus_type', $postId)['label']) ? get_field('cpt_bonus_type', $postId)['label'] : '';
    switch ($column) {
        case 'bonus_casino':
            $title = get_the_title($casinoId);
            $postUrl = admin_url('post.php?post=' . $casinoId) . '&action=edit';
            echo "<a href='{$postUrl}'>{$title}</a>";
            break;

        case 'bonus_type':
            echo $bonusType;
            break;

        case 'bonus_start_date':
            echo "-";
            break;

        case 'bonus_end_date':
            echo "-";
            break;
    }
}

add_action('manage_bonus_posts_custom_column', 'customBonusColumnData', 10, 2);
