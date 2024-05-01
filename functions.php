<?php

use Bankroll\Includes\Init;
use Bankroll\Includes\Enums\BonusType;
use Bankroll\Includes\Factory\CasinoFactory;

define('BANKROLL_DIR', get_stylesheet_directory());
define('BANKROLL_DIR_URI', get_stylesheet_directory_uri());
define('BANKROLL_ASSETS_URL', BANKROLL_DIR_URI . '/dist');

require_once('vendor/autoload.php');

Init::get_instance();

function _ts($string)
{
    return $string;
}

function dump(mixed $value, bool $die = false)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    if ($die) {
        die();
    }
}

if (!function_exists('write_log')) {

    function write_log($log)
    {
        if (true === WP_DEBUG) {
            if (is_array($log) || is_object($log)) {
                error_log(print_r($log, true));
            } else {
                error_log($log);
            }
        }
    }
}

// BONUS CPT FUNCTIONALITY
//
//
function onBonusPostSave(int $id, \WP_Post $post, bool $update)
{
    if (!$update) {
        return;
    }

    if ($post->post_type === 'bonus') {
        $post_id = $post->ID;
        $casino_id = !empty(get_field('cpt_bonus_for_relationship', $post_id)) ?
            get_field('cpt_bonus_for_relationship', $post_id)[0] :
            null;

        $link_id = !empty(get_field('cpt_bonus_link', $post_id)) ? get_field('cpt_bonus_link', $post_id)[0] : null;

        $bonus_type = !empty(BonusType::fromName(get_field('cpt_bonus_type', $post_id))) ?
            BonusType::fromName(get_field('cpt_bonus_type', $post_id)) :
            '';
        $title = '';

        if (!empty($casino_id)) {
            update_field('cpt_bonus_for_id', $casino_id);
            $title = get_the_title($casino_id);
        }

        if (!empty($link_id)) {
            update_field('cpt_bonus_link_id', $link_id);
        }

        $post->post_title = "[{$title}] [{$bonus_type}]";

        remove_action('save_post', 'onBonusPostSave');
        wp_update_post($post);
        add_action('save_post', 'onBonusPostSave', 10, 3);
    }
}
add_action('save_post', 'onBonusPostSave', 10, 3);

function addCustomColumnForBonus($columns)
{
    unset($columns['date']);
    $columns['bonus_resource'] = 'Casino';
    $columns['affiliate_link'] = 'Affiliate Link';
    $columns['bonus_type'] = 'Bonus Type';
    $columns['bonus_start_date'] = 'Bonus Start Date';
    $columns['bonus_end_date'] = 'Bonus End Date';

    return $columns;
}
add_filter('manage_bonus_posts_columns', 'addCustomColumnForBonus');

function customBonusColumnData($column, $postId)
{
    $casinoId = get_field('cpt_bonus_for_id', $postId);

    $affiliateLinkIdRaw = get_field('cpt_bonus_link', $postId);
    $affiliateLinkUrl = !empty($affiliateLinkIdRaw) ? get_field('acf_link_url', $affiliateLinkIdRaw[0]) : null;

    $bonusType = !empty(BonusType::fromName(get_field('cpt_bonus_type', $postId))) ?
        BonusType::fromName(get_field('cpt_bonus_type', $postId)) :
        '';

    $start_date = !empty(get_field('cpt_bonus_bonus_date_group', $postId)['cpt_bonus_start_date']) ?
        get_field('cpt_bonus_bonus_date_group')['cpt_bonus_start_date'] :
        '-';

    $end_date = !empty(get_field('cpt_bonus_bonus_date_group', $postId)['cpt_bonus_end_date']) ?
        get_field('cpt_bonus_bonus_date_group')['cpt_bonus_end_date'] :
        '-';

    switch ($column) {
        case 'bonus_resource':
            $title = get_the_title($casinoId);
            $postUrl = admin_url('post.php?post=' . $casinoId) . '&action=edit';
            echo "<a href='{$postUrl}'>{$title}</a>";
            break;
        case 'affiliate_link':
            echo !empty($affiliateLinkUrl) ? $affiliateLinkUrl : '-';
            break;
        case 'bonus_type':
            echo $bonusType;
            break;
        case 'bonus_start_date':
            echo $start_date;
            break;
        case 'bonus_end_date':
            echo $end_date;
            break;
    }
}
add_action('manage_bonus_posts_custom_column', 'customBonusColumnData', 10, 2);
// END BONUS CPT FUNCTIONALITY
//
//

// IN CASINO ADMIN PANEL SHOW ONLY BONUSES THAT ARE RELATED TO THIS CASINO
function my_acf_fields_relationship_query($args, $field, $post_id)
{
    $args['post_status'] = 'publish';
    $args['meta_key'] = 'cpt_bonus_for_id';
    $args['meta_compare'] = 'LIKE';
    $args['meta_value'] = $post_id;

    return $args;
}
add_filter('acf/fields/relationship/query/name=cpt_casino_related_bonuses', 'my_acf_fields_relationship_query', 10, 3);

// HIDE FIELD FROM BONUS ADMIN PANEL
function hideBonusFields()
{
    echo '<style>
    [data-name="cpt_bonus_for_id"],
    [data-name="cpt_bonus_link_id"] {
        display: none;
    }
    </style>';
}
add_action('admin_head', 'hideBonusFields');

function deleteExpiredBonuses()
{
    $args = array(
        'post_type' => 'bonus',
        'posts_per_page' => -1,
        'meta_query' => array(
            array(
                'key' => 'cpt_bonus_bonus_date_group_cpt_bonus_end_date',
                'compare' => '<',
                'value' => date('d-m-Y')
            )
        )
    );

    $posts = get_posts($args);

    if (!empty($posts)) {
        foreach ($posts as $post) {
            if (!empty($post->ID)) {
                wp_delete_post($post->ID);
            }
        }
    }
}
add_action('init', 'deleteExpiredBonuses');

// LOAD BONUS TYPES
function loadBonusTypes($field)
{
    $field['choices'] = array();

    $bonus_types = [];

    $cases = BonusType::cases();

    foreach ($cases as $type) {
        $bonus_types[$type->key()] = [
            'label' => $type->label(),
            'enum' => $type
        ];
    }


    if (is_array($bonus_types)) {
        foreach ($bonus_types as $key => $choice) {
            $field['choices'][$key] = $choice['label'];
        }
    }

    return $field;
}

add_filter('acf/load_field/name=cpt_bonus_type', 'loadBonusTypes');
