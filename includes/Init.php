<?php

namespace Bankroll\Includes;

use Bankroll\Blocks\RegisterBlocks;
use Bankroll\Includes\Ajax\AjaxFunctions;
use Bankroll\Includes\Resource\ThemeSettings;
use Bankroll\Includes\Setup\{InitACF, CustomPostTypes, Taxonomies, Menus, Enqueue, DisablePosts, RegisterMailer};
use PHPMailer\PHPMailer\PHPMailer;

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
        // AjaxFunctions::get_instance();
        // DisablePosts::get_instance();

//        new RegisterMailer();
//        new RegisterBlocks();

        $this->setupHooks();
        $this->disableComments();
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


        add_action('save_post', [$this, 'onLinkSave'], 10, 3);
        add_action('manage_affiliate_link_posts_custom_column', [$this, 'customLinkColumnData'], 10, 2);
        add_filter('manage_affiliate_link_posts_columns', [$this, 'addCustomColumnsForLinks']);
    }

    public function setupTheme(): void
    {
        add_theme_support('title-tag');
        remove_action('wp_head', 'rest_output_link_wp_head', 10);
        remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
        remove_action('wp_head', 'wp_generator');
        remove_action('wp_head', 'rsd_link');
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

    private function disableComments()
    {
        add_action('admin_init', function () {
            global $pagenow;

            if ($pagenow === 'edit-comments.php') {
                wp_safe_redirect(admin_url());
                exit;
            }

            remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

            foreach (get_post_types() as $post_type) {
                if (post_type_supports($post_type, 'comments')) {
                    remove_post_type_support($post_type, 'comments');
                    remove_post_type_support($post_type, 'trackbacks');
                }
            }
        });

        add_filter('comments_open', '__return_false', 20, 2);
        add_filter('pings_open', '__return_false', 20, 2);

        add_filter('comments_array', '__return_empty_array', 10, 2);

        add_action('admin_menu', function () {
            remove_menu_page('edit-comments.php');
        });

        add_action('init', function () {
            if (is_admin_bar_showing()) {
                remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
            }
        });
    }

    public function removeImageSizes()
    {
        remove_image_size('1536x1536');
        remove_image_size('2048x2048');
    }

    public function addBankrollImageSizes()
    {
        add_image_size('bankroll-logo', 400, 400);
        add_image_size('bankroll-background', 1400, 400);
    }

    public function setGlobalSiteSettings()
    {
        global $themeSettings;
        $themeSettings = new ThemeSettings();
    }

    public function addCustomColumnsForLinks($columns)
    {
        unset($columns['date']);
        unset($columns['title']);
        $columns['description'] = 'Description';
        $columns['url'] = 'Url';

        return $columns;
    }

    public function customLinkColumnData($column, $postId)
    {
        $description = !empty(get_field('acf_link_description', $postId)) ? get_field('acf_link_description', $postId) : '-';
        $url = !empty(get_field('acf_link_url', $postId)) ? get_field('acf_link_url', $postId) : '-';
        $admin_url = admin_url('post.php?post=' . $postId) . '&action=edit';

        switch ($column) {
            case 'description':
                echo "<a class='row-title' href='{$admin_url}'>" . $description . "</a>";
                break;
            case 'url':
                echo "<a href='{$url}'>" . $url . "</a>";
                break;
            default:
                break;
        }
    }

    public function onLinkSave(int $id, \WP_Post $post, bool $update)
    {
        if ($post->post_type === 'affiliate_link') {
            $postId = $post->ID;
            $title = get_field('acf_link_description', $postId);

            $post->post_title = "$title";

            remove_action('save_post', [$this, 'onLinkSave']);
            wp_update_post($post);
            add_action('save_post', [$this, 'onLinkSave'], 10, 3);
        }
    }
}
