<?php

namespace Bankroll\Includes\View;

class Template
{
    public static function getTemplate(string $folder, string $part = '', array $data = []): void
    {
        $partial = "parts/{$folder}/" . $part;

        if (file_exists(BANKROLL_DIR . '/' . $partial . '.php')) {
            get_template_part(
                slug: $partial,
                args: $data
            );
        }
    }
}
