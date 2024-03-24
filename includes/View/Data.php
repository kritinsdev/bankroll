<?php

namespace Bankroll\Includes\View;

class Data
{
    public static function prepareHero(int $id, string $type = 'page'): ?array
    {
        if (empty($id)) {
            return null;
        }

        return [
            'title' => get_field("{$type}_hero_title", $id),
            'text' => get_field("{$type}_hero_text", $id),
            'settings' => get_field("{$type}_hero_settings", $id)
        ];
    }
}