<?php

namespace Bankroll\Includes;

class QueryBuilder
{
    public static function queryForPosts(...$args)
    {
        $args = array(
            'post_type' => 'slot',
            'tax_query' => array(
                array(
                    'taxonomy' => 'provider',
                    'field'    => 'id',
                    'terms'    => [530],
                ),
            ),
        );

        $query = new \WP_Query( $args );
        $idsArray = [];
        $posts = $query->posts;

        foreach($posts as $post) {
            $idsArray[] = $post->ID;
        }

        return $idsArray;
    }
}