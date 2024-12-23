<?php

namespace Bankroll\Blocks\Types\Toplist;

use Bankroll\Blocks\AbstractBlock;
use Bankroll\Includes\Factory\CasinoFactory;

class Toplist extends AbstractBlock
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

        $resource_id = $block_data['block_toplist'][0];
        $items = get_field('toplist_items', $resource_id);

        if (!empty($items)) {
            foreach ($items as $id) {
                $this->preparedData['toplist_items'][] = CasinoFactory::create($id);
            }
        }
    }
}
