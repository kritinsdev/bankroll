<?php

namespace Bankroll\Includes\Setup;

use Bankroll\Includes\Singleton;

class Taxonomies
{
    use Singleton;

    protected array $taxonomies = [
        // 'feature' => [
        //     'singular' => 'Feature',
        //     'plural' => 'Features',
        //     'slug' => 'feature',
        //     'supports' => ['slot'],
        //     'publicly_queryable' => true,
        //     'hierarchical' => true
        // ],
    ];

    protected function __construct()
    {
        $this->setupHooks();
    }

    protected function setupHooks(): void
    {
        add_action('init', [$this, 'addTaxonomies'], 0);
    }

    public function addTaxonomies(): void
    {
        foreach ($this->taxonomies as $taxonomy => $taxonomyData) {
            register_taxonomy($taxonomy, $taxonomyData['supports'], [
                'hierarchical' => $taxonomyData['hierarchical'],
                'labels' => [
                    'name' => $taxonomyData['plural'],
                    'singular_name' => $taxonomyData['singular'],
                    'search_items' => 'Search ' . $taxonomyData['plural'],
                    'all_items' => 'All ' . $taxonomyData['plural'],
                    'parent_item' => 'Parent ' . $taxonomyData['singular'],
                    'parent_item_colon' => 'Parent ' . $taxonomyData['singular'] . ':',
                    'edit_item' => 'Edit ' . $taxonomyData['singular'],
                    'update_item' => 'Update ' . $taxonomyData['singular'],
                    'add_new_item' => 'Add New ' . $taxonomyData['singular'],
                    'new_item_name' => 'New ' . $taxonomyData['singular'] . ' Name',
                    'menu_name' => $taxonomyData['plural'],
                ],
                'publicly_queryable' => $taxonomyData['publicly_queryable'],
                'show_ui' => true,
                'show_admin_column' => true,
                'query_var' => true,
                'show_in_rest' => false,
                'rewrite' => [
                    'slug' => $taxonomyData['slug'],
                    'with_front' => true,
                    'hierarchical' => false,
                ],
            ]);
        }
    }
}
