<?php

namespace Bankroll\Includes;

class QueryBuilder
{
    public static function queryForPosts(array $data): array
    {
        $query['post_type'] = $data['postType'];
        $query['tax_query']['relation'] = 'AND';

        foreach($data['query'] as $taxonomy => $ids) {
            if(empty($ids)) {
                continue;
            }            

            $taxQuery = [
                'taxonomy' => $taxonomy,
                'field' => 'id',
                'terms' => $ids
            ];

            $query['tax_query'][] = $taxQuery;
        }

        $query = new \WP_Query( $query );
        $idsArray = [];
        $posts = $query->posts;

        foreach($posts as $post) {
            $idsArray[] = $post->ID;
        }

        return $idsArray;
    }
}