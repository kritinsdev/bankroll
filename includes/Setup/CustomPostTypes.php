<?php

namespace Bankroll\Includes\Setup;

use Bankroll\Includes\Singleton;

class CustomPostTypes
{
    use Singleton;

    protected array $customPostTypes = [
        'casino'     => [
            'singular'    => 'Casino',
            'plural'      => 'Casinos',
            'slug'        => 'casino',
            'has_archive' => false,
            'supports'    => ['title'],
            'taxonomies' => []
        ],
        'bonus' => [
            'singular'    => 'Bonus',
            'plural'      => 'Bonuses',
            'slug'        => 'bonus',
            'supports'    => [''],
            'taxonomies' => []
        ],
        // 'sportsbook' => [
        //     'singular'    => 'Sportsbook',
        //     'plural'      => 'Sportsbooks',
        //     'slug'        => 'sportsbook',
        //     'supports'    => ['title'],
        //     'taxonomies' => []
        // ],
        // 'payment' => [
        //     'singular'    => 'Payment Method',
        //     'plural'      => 'Payment Methods',
        //     'slug'        => 'payment-method',
        //     'supports'    => ['title'],
        //     'taxonomies' => []
        // ],
        // 'software' => [
        //     'singular'    => 'Software Provider',
        //     'plural'      => 'Software Providers',
        //     'slug'        => 'software-provider',
        //     'supports'    => ['title'],
        //     'taxonomies' => []
        // ],
        'toplist' => [
            'singular'    => 'Toplist',
            'plural'      => 'Toplists',
            'supports'    => ['title'],
            'public' => true,
            'exclude_from_search' => true,
            'show_in_admin_bar'   => false,
            'show_in_nav_menus'   => false,
            'publicly_queryable'  => false,
            'query_var'           => false
        ],
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
        foreach ($this->customPostTypes as $custom_post_type => $customPostTypeData) {

            $labels = [
                'name'                  => $customPostTypeData['plural'],
                'singular_name'         => $customPostTypeData['singular'],
                'menu_name'             => $customPostTypeData['plural'],
                'name_admin_bar'        => $customPostTypeData['singular'],
                'add_new'               => 'Add New',
                'add_new_item'          => 'Add New ' . $customPostTypeData['singular'],
                'new_item'              => 'New ' . $customPostTypeData['singular'],
                'edit_item'             => 'Edit ' . $customPostTypeData['singular'],
                'view_item'             => 'View ' . $customPostTypeData['singular'],
                'all_items'             => 'All ' . $customPostTypeData['plural'],
            ];
            $args   = [
                'labels'             => $labels,
                'description'        => $customPostTypeData['singular'] . ' custom post type.',
                'public'             => isset($customPostTypeData['public']) ? $customPostTypeData['public'] : true,
                'publicly_queryable' => isset($customPostTypeData['publicly_queryable']) ? $customPostTypeData['publicly_queryable'] : true,
                'show_ui'            => isset($customPostTypeData['show_ui']) ? $customPostTypeData['show_ui'] : true,
                'show_in_menu'       => isset($customPostTypeData['show_in_menu']) ? $customPostTypeData['show_in_menu'] : true,
                'query_var'          => isset($customPostTypeData['query_var']) ? $customPostTypeData['query_var'] : true,
                'exclude_from_search' => isset($customPostTypeData['exclude_from_search']) ? $customPostTypeData['exclude_from_search'] : false,
                'has_archive'        => isset($customPostTypeData['has_archive']) ? $customPostTypeData['has_archive'] : false,
                'hierarchical'       => isset($customPostTypeData['hierarchical']) ? $customPostTypeData['hierarchical'] : false,
                'menu_position'      => 20,
                'supports'           => $customPostTypeData['supports'],
                'taxonomies'         => !empty($customPostTypeData['taxonomies']) ? $customPostTypeData['taxonomies'] : [],
                'show_in_rest'       => false,
            ];

            if (!empty($customPostTypeData['slug'])) {
                $args['rewrite'] = ['slug' => $customPostTypeData['slug']];
            } else {
                $args['rewrite'] = false;
            }

            register_post_type($custom_post_type, $args);
        }
    }
}
