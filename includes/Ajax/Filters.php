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

        $postIds = QueryBuilder::queryForPosts($queriedItems);

        ob_start();

        foreach($postIds as $id) {
            $slot = SlotFactory::create($id);
            get_template_part('parts/cards/slot/card-1', null, ['data' => $slot]);
        }

        $cards = ob_get_contents();
        ob_end_clean();

        exit(json_encode($cards));
    }
}