<?php

namespace Bankroll\Includes\Setup;

use Bankroll\Includes\Singleton;

class Enqueue
{
    use Singleton;

    public string $assets_dir = BANKROLL_DIR_URI . '/dist/';
    public string $color_theme = 'default';

    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'styles']);
        // add_action('wp_enqueue_scripts', [$this, 'scripts']);
    }

    public function styles()
    {
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
        wp_dequeue_style('wc-blocks-style');
        wp_dequeue_style('classic-theme-styles');
        wp_dequeue_style('global-styles');

        wp_register_style('main', $this->assets_dir . 'main.css', [], current_time('timestamp'));
        wp_enqueue_style('main');

        wp_register_style('theme-colors', $this->assets_dir . 'theme-' . $this->color_theme . '.css', [], current_time('timestamp'));
        wp_enqueue_style('theme-colors');
    }

    public function scripts()
    {
        wp_dequeue_script('jquery');

        wp_register_script('main', $this->assets_dir . 'main.js', [], current_time('timestamp'), true);
        wp_enqueue_script('main');

        // wp_localize_script('main', 'ajaxObject', [
        //     'ajaxUrl' => admin_url('admin-ajax.php'),
        //     'nonce' => wp_create_nonce('nonce')
        // ]);
    }
}
