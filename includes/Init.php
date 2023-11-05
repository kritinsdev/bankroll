<?php

namespace Bankroll\Includes;

use Bankroll\Includes\Ajax\AjaxFunctions;
use Bankroll\Includes\Resource\ThemeSettings;
use Bankroll\Includes\Setup\{InitACF, CustomPostTypes, Taxonomies, Menus, Enqueue};

class Init
{
    use Singleton;

    protected function __construct()
    {
        InitACF::get_instance();
        CustomPostTypes::get_instance();
        Taxonomies::get_instance();
        Menus::get_instance();
        Enqueue::get_instance();
        AjaxFunctions::get_instance();

        $this->setupHooks();
    }

    protected function setupHooks(): void
    {
        add_action('init', [$this, 'setGlobalSiteSettings'], 1);
        add_action('init', [$this, 'removeEditor']);
        add_action('init', [$this, 'disableEmojis']);
        add_action('init', [$this, 'removeImageSizes']);
        add_action('init', [$this, 'addBankrollImageSizes']);
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
        remove_action('admin_print_styles', 'print_emoji_styles');
        remove_filter('the_content_feed', 'wp_staticize_emoji');
        remove_filter('comment_text_rss', 'wp_staticize_emoji');
        remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
        // add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
        // add_filter('wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2);
    }

    public function removeImageSizes()
    {
        remove_image_size('1536x1536');
        remove_image_size('2048x2048');
    }

    public function addBankrollImageSizes()
    {
        add_image_size('bankroll-test', 300, 300, false);
    }

    public function setGlobalSiteSettings()
    {
        global $themeSettings;
        $themeSettings = new ThemeSettings();
    }
}
