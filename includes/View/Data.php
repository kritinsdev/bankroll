<?php

namespace Bankroll\Includes\View;

class Data
{
    public static function prepareImage(
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
    public static function prepareHero(int $id, string $type = 'page'): ?array
    {
        if (empty($id)) {
            return null;
        }

        switch ($type) {
            case 'casino':
                return [
                    'a' => 'b'
                ];
            default:
                return [
                    'title' => get_field("{$type}_hero_title", $id),
                    'text' => get_field("{$type}_hero_text", $id),
                    'settings' => get_field("{$type}_hero_settings", $id),
                    'image' => Data::prepareImage(get_field("{$type}_hero_settings", $id)['content_image']),
                    'background_image' => wp_get_attachment_image_src(
                        get_field("{$type}_hero_settings", $id)['background_image'],
                        'bankroll-background'
                    ),
                ];
        }
    }
}