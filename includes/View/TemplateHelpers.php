<?php

namespace Bankroll\Includes\View;

class TemplateHelpers
{
    public static function getTemplatePart(string $folder, string $part = '', array $data = []): void
    {
        $partial = "parts/{$folder}/"  . $part;

        if (file_exists(BANKROLL_DIR . '/' . $partial . '.php')) {
            get_template_part($partial, null, $data);
        }
    }

    public static function svgIcon(string $icon, mixed $width = 20, $color = '#000'): void
    {
        if (empty($icon)) {
            return;
        }

        $iconHtml = "<svg width='{$width}' height='{$width}' color='{$color}'>";
        $iconHtml .= "<use xlink:href='#{$icon}' />";
        $iconHtml .= "</svg>";

        echo $iconHtml;
    }
}
