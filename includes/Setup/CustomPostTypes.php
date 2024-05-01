<?php

namespace Bankroll\Includes\Setup;

use Bankroll\Includes\Singleton;

class CustomPostTypes
{
    use Singleton;

    protected array $customPostTypes = [
        'casino' => [
            'singular' => 'Casino',
            'plural' => 'Casinos',
            'slug' => 'casino',
            'has_archive' => false,
            'supports' => ['title'],
        ],
        'bonus' => [
            'singular' => 'Bonus',
            'plural' => 'Bonuses',
            'slug' => 'bonus',
            'public' => true,
            'supports' => [''],
            'exclude_from_search' => true,
            'show_in_admin_bar' => false,
            'show_in_nav_menus' => false,
            'publicly_queryable' => false,
            'query_var' => false
        ],
        'toplist' => [
            'singular' => 'Toplist',
            'plural' => 'Toplists',
            'supports' => ['title'],
            'public' => true,
            'exclude_from_search' => true,
            'show_in_admin_bar' => false,
            'show_in_nav_menus' => false,
            'publicly_queryable' => false,
            'query_var' => false
        ],
        'affiliate_link' => [
            'singular' => 'Affiliate Link',
            'plural' => 'Affiliate Links',
            'supports' => [''],
            'public' => true,
            'exclude_from_search' => true,
            'show_in_admin_bar' => false,
            'show_in_nav_menus' => false,
            'publicly_queryable' => false,
            'query_var' => false
        ],
//        'slot' => [
//            'singular' => 'Slot',
//            'plural' => 'Slots',
//            'slug' => 'slot',
//            'has_archive' => false,
//            'supports' => ['title'],
//        ],
//        'payment_method' => [
//            'singular' => 'Payment Method',
//            'plural' => 'Payment Methods',
//            'slug' => 'payment-method',
//            'supports' => ['title'],
//            'taxonomies' => []
//        ],
//        'software' => [
//            'singular' => 'Software Provider',
//            'plural' => 'Software Providers',
//            'slug' => 'software-provider',
//            'supports' => ['title'],
//            'taxonomies' => []
//        ],
    ];

    protected function __construct()
    {
        $this->setupHooks();
    }

    protected function setupHooks()
    {
        add_action('init', [$this, 'registerPostTypes']);
    }

    public function registerPostTypes()
    {
        foreach ($this->customPostTypes as $cpt => $cpt_data) {

            $labels = [
                'name' => $cpt_data['plural'],
                'singular_name' => $cpt_data['singular'],
                'menu_name' => $cpt_data['plural'],
                'name_admin_bar' => $cpt_data['singular'],
                'add_new' => 'Add New',
                'add_new_item' => 'Add New ' . $cpt_data['singular'],
                'new_item' => 'New ' . $cpt_data['singular'],
                'edit_item' => 'Edit ' . $cpt_data['singular'],
                'view_item' => 'View ' . $cpt_data['singular'],
                'all_items' => 'All ' . $cpt_data['plural'],
            ];
            $args = [
                'labels' => $labels,
                'description' => $cpt_data['singular'] . ' custom post type.',
                'public' => $cpt_data['public'] ?? true,
                'publicly_queryable' => $cpt_data['publicly_queryable'] ?? true,
                'show_ui' => $cpt_data['show_ui'] ?? true,
                'show_in_menu' => $cpt_data['show_in_menu'] ?? true,
                'query_var' => $cpt_data['query_var'] ?? true,
                'exclude_from_search' => $cpt_data['exclude_from_search'] ?? false,
                'has_archive' => $cpt_data['has_archive'] ?? false,
                'hierarchical' => $cpt_data['hierarchical'] ?? false,
                'menu_position' => 20,
                'supports' => $cpt_data['supports'],
                'taxonomies' => !empty($cpt_data['taxonomies']) ? $cpt_data['taxonomies'] : [],
                'show_in_rest' => false,
            ];

            if (!empty($cpt_data['slug'])) {
                $args['rewrite'] = ['slug' => $cpt_data['slug']];
            } else {
                $args['rewrite'] = false;
            }

            register_post_type($cpt, $args);
        }
    }
}
