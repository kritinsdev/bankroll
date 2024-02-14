<?php

namespace Bankroll\Includes\Setup;

use Bankroll\Includes\Singleton;

class Enqueue
{
    use Singleton;

    public string $cssDir = BANKROLL_DIR_URI . '/dist/';
    public string $jsDir = BANKROLL_DIR_URI . '/dist/';
    public string $colorTheme = 'default';

    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'bankrollStyles']);
        // add_action('wp_enqueue_scripts', [$this, 'bankrollScripts']);
        // add_filter('script_loader_tag', [$this, 'deferScripts'], 10, 2);
    }

    public function bankrollStyles()
    {
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
        wp_dequeue_style('wc-blocks-style');
        wp_dequeue_style('classic-theme-styles');
        wp_dequeue_style('global-styles');

        wp_register_style('main', $this->cssDir . 'main.css', [], current_time('timestamp'));
        wp_enqueue_style('main');

        wp_register_style('theme-colors', $this->cssDir . 'theme-' . $this->colorTheme . '.css', [], current_time('timestamp'));
        wp_enqueue_style('theme-colors');
    }

    public function bankrollScripts()
    {
        wp_register_script('main', $this->jsDir . 'main.js', [], current_time('timestamp'), true);
        wp_enqueue_script('main');

        wp_localize_script('main', 'ajaxObject', [
            'ajaxUrl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('nonce')
        ]);
    }

    public function deferScripts($tag, $handle)
    {
        $handles = [
            'main',
        ];

        foreach ($handles as $defer_script) {
            if ($defer_script === $handle) {
                return str_replace(' src', ' defer src', $tag);
            }
        }

        return $tag;
    }
}
