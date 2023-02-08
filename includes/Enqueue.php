<?php

namespace Bankroll\Core;

class Enqueue
{
    use Singleton;

    public string $cssDir = BANKROLL_DIR_URI . '/dist/';
    public string $jsDir = BANKROLL_DIR_URI . '/dist/';
    public string $colorTheme = 'default';

    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'bankrollStyles']);
        add_action('wp_enqueue_scripts', [$this, 'bankrollScripts']);
        add_filter('script_loader_tag', [$this, 'deferScripts'], 10, 2);
    }

    public function bankrollStyles()
    {

        wp_register_style('theme-colors', $this->cssDir . 'colorTheme-' . $this->colorTheme . '.css', [], current_time('timestamp'));
        wp_register_style('main', $this->cssDir . 'main.css', [], current_time('timestamp'));
        wp_enqueue_style('theme-colors');
        wp_enqueue_style('main');
    }

    public function bankrollScripts()
    {
        wp_register_script('main', $this->jsDir . 'main.js', [''], current_time('timestamp'), true);
        wp_enqueue_script('main');

        wp_localize_script('main', 'ajaxObject', [
            'adminAjax'       => admin_url('admin-ajax.php'),
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
