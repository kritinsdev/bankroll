<?php

namespace Bankroll\Includes\View;

class Components
{
    public static function imageData(
        ?int $id,
        $size = 'bankroll-image'
    ): array
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

        $default_class = [];

        if(!empty($class_list)) {
            $imageData['class'] = array_merge($default_class, $class_list);
        }

        Template::get('global', 'image', $imageData);
    }
}