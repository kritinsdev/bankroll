<?php

namespace Bankroll\Includes\View;

class Components
{
    public static function svgIcon(
        string $icon,
        mixed  $width = 20,
        string $color = '#000',
        string $class = null
    ): void
    {
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

    public static function imageData(
        ?int $id,
        $size = 'bankroll-image'
    ): ?array
    {
        if(empty($id)) {
            return [];
        }

        $imageData['src'] = wp_get_attachment_image_src($id, $size);
        $imageData['srcset'] = wp_get_attachment_image_srcset($id, $size);
        $imageData['sizes'] = wp_get_attachment_image_sizes($id, $size);
        $imageData['alt'] = get_post_meta($id, '_wp_attachment_image_alt', true);

        return $imageData;
    }

    public static function image(array $imageData, array $class_list = []): void
    {
        if(empty($imageData['src'])) {
            return;
        }

        $default_class = ['default-image'];

        if(!empty($class_list)) {
            $imageData['class'] = array_merge($default_class, $class_list);
        } else {
            $imageData['class'] = $default_class;
        }

        Template::templatePart('global', 'image', $imageData);
    }
}