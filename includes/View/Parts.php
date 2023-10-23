<?php

namespace Bankroll\Includes\View;

class Parts
{
    public static function siteLogo(array $args = []): string
    {
        return BANKROLL_DIR_URI . '/dist/img/placeholder-logo.svg';
    }

    public static function navigation(array $args = []): void
    {
        get_template_part('parts/global/navigation', null, []);
    }

    public static function hero(array $args): void
    {
        $template = BANKROLL_DIR . "/parts/global/hero/hero-" . $args['template'] . ".php";

        if (file_exists($template)) {
            get_template_part('/parts/global/hero/hero-' . $args['template']);
        } else {
            get_template_part('/parts/global/hero/hero-page');
        }
    }

    public static function postDetails(array $args = []): void
    {
        get_template_part('parts/global/post-details');
    }
}
