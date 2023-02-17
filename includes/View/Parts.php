<?php

namespace Bankroll\Includes\View;

class Parts {
    public static function navigation(array $args = []): void {
        get_template_part('parts/global/navigation', null, ['data' => ['']]);
    }

    public static function hero(array $args = []): void {
        get_template_part('parts/global/hero', null, ['data' => ['']]);
    }

    public static function siteLogo(array $args = []): string {
        return BANKROLL_DIR_URI . '/dist/img/logo-placeholder.png';
    }
}