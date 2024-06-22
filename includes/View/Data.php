<?php

namespace Bankroll\Includes\View;

class Data
{
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
                    'image' => Components::imageData(get_field("{$type}_hero_settings", $id)['content_image']),
                    'background_image' => wp_get_attachment_image_src(
                        get_field("{$type}_hero_settings", $id)['background_image'],
                        'bankroll-background'
                    ),
                ];
        }
    }
}