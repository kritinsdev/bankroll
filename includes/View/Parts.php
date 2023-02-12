<?php

namespace Bankroll\Core\View;

class Parts {
    public static function navigation($args = []): void {
        get_template_part('parts/global/navigation', null, ['data' => ['']]);
    }

    public static function hero($args = []): void {
        get_template_part('parts/global/hero', null, ['data' => ['']]);
    }

    public static function siteLogo($args = []): string {
        return BANKROLL_DIR_URI . '/dist/img/logo-placeholder.png';
    }
}