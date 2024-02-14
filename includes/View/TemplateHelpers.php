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

    public static function svgIcon(
        string $icon,
        mixed $width = 20,
        $color = '#000',
        $class = null
    ): void {
        if (empty($icon)) {
            return;
        }

        if (!empty($class)) {
            $class = "<div class='{$class}'>";
        }

        $iconHtml = !empty($class) ? $class : "<div>";
        $iconHtml .= "<svg width='{$width}' height='{$width}' color='{$color}'>";
        $iconHtml .= "<use xlink:href='#{$icon}' />";
        $iconHtml .= "</svg>";
        $iconHtml .= "</div>";

        echo $iconHtml;
    }
}
