<?php

namespace Bankroll\Core;

class CustomPostTypes
{
    use Singleton;

    protected array $customPostTypes = [
        'casino'     => [
            'singular'    => 'Casino',
            'plural'      => 'Casinos',
            'slug'        => 'casino',
            'has_archive' => false,
            'supports'    => ['title', 'thumbnail'],
            'taxonomies'  => ['author'],
        ],
        'slot'       => [
            'singular'    => 'Slot',
            'plural'      => 'Slots',
            'slug'        => 'slot',
            'has_archive' => false,
            'supports'    => ['title', 'thumbnail'],
            'taxonomies'  => ['author'],
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
                'public'             => true,
                'publicly_queryable' => true,
                'show_ui'            => true,
                'show_in_menu'       => true,
                'query_var'          => true,
                'rewrite'            => ['slug' => $customPostTypeData['slug']],
                'capability_type'    => 'post',
                'has_archive'        => $customPostTypeData['has_archive'],
                'hierarchical'       => false,
                'menu_position'      => 20,
                'supports'           => $customPostTypeData['supports'],
                'taxonomies'         => $customPostTypeData['taxonomies'],
                'show_in_rest'       => false,
            ];

            register_post_type($custom_post_type, $args);
        }
    }

}
