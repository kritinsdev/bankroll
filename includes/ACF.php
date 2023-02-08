<?php

namespace Bankroll\Core;

use Bankroll\Core\Singleton;

class ACF {
    use Singleton;

    public function __construct() {
        include_once(BANKROLL_DIR . '/vendor/advanced-custom-fields-pro/acf.php');

        add_filter('acf/settings/url', [$this, 'acfSettingsUrl']);
        add_filter('acf/settings/show_updates', '__return_false', 100);
    }

    public function acfSettingsUrl($url) {
        return BANKROLL_DIR_URI . '/vendor/advanced-custom-fields-pro/';
    }
}