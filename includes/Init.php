<?php

namespace Bankroll\Includes;

use Bankroll\Includes\Ajax\AjaxFunctions;


class Init
{
    use Singleton;
    
    protected function __construct()
    {
        ACF::get_instance();
        CustomPostTypes::get_instance();
        Taxonomies::get_instance();
        Menu::get_instance();
        Enqueue::get_instance();
        // AjaxFunctions::get_instance();

        $this->setupHooks();
    }

    protected function setupHooks(): void
    {
        add_action('init', [$this, 'removeEditor']);
        add_action('after_setup_theme', [$this, 'setupTheme']);
        add_filter('use_block_editor_for_post', '__return_false', 10);
        add_filter('comments_open', '__return_false', 20, 2);
        add_filter('pings_open', '__return_false', 20, 2);
        add_filter('comments_array', '__return_empty_array', 10, 2);
    }

    public function setupTheme(): void
    {
        add_theme_support('title-tag');
    }

    public function removeEditor(): void
    {
        remove_post_type_support('page', 'editor');
        remove_post_type_support('post', 'editor');
    }
}
