<?php

namespace Bankroll\Blocks\Toplist;

use Bankroll\Blocks\DefaultBlock;
use Bankroll\Includes\Factory\CasinoFactory;

class Toplist extends DefaultBlock
{
    public function __construct(string $block_key)
    {
        parent::__construct($block_key);
    }

    public function prepareData(array|false $block_data): void
    {
        if (empty($block_data)) {
            return;
        }

        $resourceId = $block_data['block_toplist'][0];
        $items = get_field('test_toplist', $resourceId);

        if (!empty($items)) {
            foreach ($items as $toplist_item_id) {
                $this->prepared_data['toplist_items'][] = CasinoFactory::create($toplist_item_id);
            }
        }
    }

    public function registerSubFields(): array
    {
        return array();
    }
}
