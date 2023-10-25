<?php

namespace Bankroll\Includes\View;

class Parts
{
    public static function navigation(array $args = []): void
    {
        TemplateHelpers::getTemplatePart('global', 'navigation', $args);
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
}
