<?php

namespace Bankroll\Includes;

class QueryBuilder
{
    public static function queryForPosts(array $data): array
    {
        $query['post_type'] = $data['postType'];

        foreach($data['query'] as $taxonomy => $ids) {

            $taxQuery = [
                'taxonomy' => $taxonomy,
                'field' => 'id',
                'terms' => $ids
            ];

            $query['tax_query'][] = $taxQuery;
        }

        $query = array(
            'post_type' => $data['postType'],
            'tax_query' => array(
                array(
                    'taxonomy' => 'provider',
                    'field'    => 'id',
                    'terms'    => [530],
                ),
            ),
        );

        $query = new \WP_Query( $query );
        $idsArray = [];
        $posts = $query->posts;

        foreach($posts as $post) {
            $idsArray[] = $post->ID;
        }

        return $idsArray;
    }
}