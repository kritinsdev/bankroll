<?php

namespace Bankroll\Includes\Setup;

use Bankroll\Includes\Singleton;

class InitACF
{
    use Singleton;

    public function __construct()
    {
        include_once(BANKROLL_DIR . '/vendor/advanced-custom-fields-pro/acf.php');

        add_filter('acf/settings/url', [$this, 'acfSettingsUrl']);
        add_filter('acf/settings/show_updates', '__return_false', 100);
        add_action('acf/init', [$this, 'registerOptionsPage']);
    }

    public function acfSettingsUrl($url)
    {
        return BANKROLL_DIR_URI . '/vendor/advanced-custom-fields-pro/';
    }

    public function registerOptionsPage()
    {
        if (function_exists('acf_add_options_page')) {

            acf_add_options_page(array(
                'page_title'    => __('Bankroll Settings'),
                'menu_title'    => __('Bankroll Settings'),
                'menu_slug'     => 'bankroll-general-settings',
                'capability'    => 'edit_posts',
                'redirect'      => false
            ));
        }
    }
}
