<?php

namespace Bankroll\Includes;

class Helpers
{
    public static function createPosts($postType, $postIds, $maxCount)
    {
        $typeFactory = 'Bankroll\Includes\Factory\\' . ucfirst($postType) . 'Factory';
        $posts = [];

        foreach ($postIds as $id) {
            $posts[] = $typeFactory::create($id);
        }

        return $posts;
    }

    public static function retrievePostsWpQuery($postType, $postIds)
    {
        $args = [
            'post_type' => $postType,
            'post__in' => $postIds,
            'posts_per_page' => -1,
        ];

        $query = new \WP_Query($args);

        $postIdsArray = [];

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $postIdsArray[] = get_the_ID();
            }
            wp_reset_postdata();
        }

        return $postIdsArray;
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
            'sizes',
        ];

        foreach ($unsetKeys as $key) {
            unset($imageArray[$key]);
        }

        return $imageArray;
    }

    public static function generateShortname(string $input)
    {
        $formatted = preg_replace('/\s+/', '_', $input);

        $formatted = preg_replace('/[^A-Za-z0-9_]/', '', $formatted);

        $formatted = strtolower($formatted);

        return $formatted;
    }
}
