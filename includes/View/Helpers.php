<?php

namespace Bankroll\Includes\View;

class Helpers
{
    public static function getTemplatePart($part = '')
    {
        $partial = 'partials/' . $part;

        if (file_exists(BANKROLL_DIR . '/' . $partial . '.php')) {
            get_template_part($partial);
        }
    }
}
