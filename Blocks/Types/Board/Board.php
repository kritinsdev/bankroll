<?php

namespace Bankroll\Blocks\Types\Board;

use Bankroll\Blocks\AbstractBlock;

class Board extends AbstractBlock
{
    public function __construct(string $block_key)
    {
        parent::__construct($block_key);
    }

    public function prepareData(array|false $data): void
    {
        if (empty($data)) {
            return;
        }

        $resourceIds = $data['block_board_' . $data['block_board_post_type'] . '_items'];
        $factory = 'Bankroll\Includes\Factory\\' . ucfirst($data['block_board_post_type']) . 'Factory';

        $this->preparedData['post_type'] = $data['block_board_post_type'];
        $this->preparedData['show_all'] = $data['block_board_show_all'];

        if (!empty($resourceIds)) {
            foreach ($resourceIds as $id) {
                $this->preparedData['items'][] = $factory::create($id);
            }
        }
    }
}
