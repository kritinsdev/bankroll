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
}
