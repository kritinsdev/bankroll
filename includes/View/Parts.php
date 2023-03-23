<?php

namespace Bankroll\Includes\View;

class Parts {
    public static function siteLogo(array $args = []): string {
        return BANKROLL_DIR_URI . '/dist/img/logo-placeholder.png';
    }
    public static function navigation(array $args = []): void {
        get_template_part('parts/global/navigation', null, ['data' => ['']]);
    }

    public static function hero(array $args = []): void {
        $template = BANKROLL_DIR . "/parts/global/hero/hero-" . $args['template'];

        if(file_exists($template)) {
            wp_die('EXISTS');
        } else {
            wp_die('DOES NOTE EXIT');
        }

        get_template_part($template);
    }
}