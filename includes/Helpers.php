<?php

namespace Bankroll\Includes;

class Helpers
{
    public static function createPosts($postType, $posts, $maxCount)
    {
        $typeFactory = 'Bankroll\Includes\Factory\\' . ucfirst($postType) . 'Factory';
        $posts = [];

        foreach ($posts as $itemCount => $id) {
            if ($itemCount >= $maxCount) {
                break;
            }

            $posts[] = $typeFactory::create($id);
        }

        return $posts;
    }

    public static function parseImageArray(bool|array $imageArray): array
    {
        if (empty($imageArray)) {
            return [];
        }

        $unsetKeys = [
            'ID',
            'filename',
            'filesize',
            'link',
            'author',
            'status',
            'uploaded_to',
            'date',
            'modified',
            'menu_order',
            'mime_type',
            'type',
            'subtype',
            'prefix',
            'icon',
            'sizes', // TODO
        ];

        foreach ($unsetKeys as $key) {
            unset($imageArray[$key]);
        }

        return $imageArray;
    }
}
