<?php

namespace Bankroll\Includes;

class Taxonomies
{
    use Singleton;

    protected array $taxonomies = [
        'provider' => [
            'singular' => 'Provider',
            'plural' => 'Providers',
            'slug' => 'provider',
            'supports' => ['slot'],
            'publicly_queryable' => true,
            'hierarchical' => true
        ],
        'theme' => [
            'singular' => 'Theme',
            'plural' => 'Themes',
            'slug' => 'theme',
            'supports' => ['slot'],
            'publicly_queryable' => true,
            'hierarchical' => true
        ],
        'feature' => [
            'singular' => 'Feature',
            'plural' => 'Features',
            'slug' => 'feature',
            'supports' => ['slot'],
            'publicly_queryable' => true,
            'hierarchical' => true
        ],
    ];

    protected function __construct()
    {
        $this->setupHooks();
    }

    protected function setupHooks(): void
    {
        add_action('init', [$this, 'addTaxonomies'], 0);
        add_action('after_switch_theme', [$this, 'importTaxonomyTerms']);
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

    public function importTaxonomyTerms(): void
    {
        $taxonomy_name = ['feature', 'theme', 'provider'];

        foreach ($taxonomy_name as $taxonomy) {
            // Read the JSON file
            $json_data = file_get_contents(BANKROLL_DIR . "/json/$taxonomy.json");
            $data = json_decode($json_data, true);

            // Loop through each record and add it as a taxonomy term
            foreach ($data as $item) {
                $term = $item[$taxonomy];

                // Check if the term exists
                $term_exists = term_exists($term, $taxonomy);

                // If the term does not exist, create it
                if (!$term_exists) {
                    wp_insert_term($term, $taxonomy);
                }
            }
        }
    }

}