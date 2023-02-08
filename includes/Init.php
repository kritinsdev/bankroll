<?php

namespace Bankroll\Core;

use Bankroll\Core\Ajax\AjaxFunctions;

class Init
{
    use Singleton;
    
    protected function __construct()
    {
        CustomPostTypes::get_instance();
        Taxonomies::get_instance();
        Menu::get_instance();
        Enqueue::get_instance();
        AjaxFunctions::get_instance();
        ACF::get_instance();

        $this->setupHooks();
    }

    protected function setupHooks(): void
    {
        add_action('init', [$this, 'removeEditor']);
        add_action('init', [$this, 'disableEmojis']);
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

    public function disableEmojis()
    {
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_filter('the_content_feed', 'wp_staticize_emoji');
        remove_action('admin_print_styles', 'print_emoji_styles');
        remove_filter('comment_text_rss', 'wp_staticize_emoji');
        remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
        add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
    }

}
