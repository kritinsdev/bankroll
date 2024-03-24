<?php

namespace Bankroll\Includes\Ajax;

use Bankroll\Includes\QueryBuilder;
use Bankroll\Includes\Factory\SlotFactory;

class Filters
{
    public function __construct()
    {
        add_action('wp_ajax_nopriv_filterResults', [$this, 'filterResults']);
        add_action('wp_ajax_filterResults', [$this, 'filterResults']);
    }

    public function filterResults()
    {
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);


        $queriedItems = [
            'postType' => 'slot',
            'query' => [
                'provider' => $data['provider'],
                'theme' => $data['theme'],
                'feature' => $data['feature']
            ]
        ];

        $postIds = $this->queryForPosts($queriedItems);

        ob_start();

        foreach($postIds as $id) {
            $slot = SlotFactory::create($id);
            get_template_part('parts/cards/slot/card-1', null, ['data' => $slot]);
        }

        $cards = ob_get_contents();
        ob_end_clean();

        exit(json_encode($cards));
    }

    public function queryForPosts(array $data): array
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