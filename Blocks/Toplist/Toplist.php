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

        $resource_id = $block_data['block_toplist'][0];
        $items = get_field('toplist_items', $resource_id);

        if (!empty($items)) {
            foreach ($items as $toplist_item_id) {
                $this->prepared_data['toplist_items'][] = CasinoFactory::create($toplist_item_id);
            }
        }
    }

    public function registerSubFields(): array
    {
        return array(
            array(
                'key' => "field_{$this->block_key}653ed756af2c7",
                'label' => 'Select toplist',
                'name' => 'block_toplist',
                'aria-label' => '',
                'type' => 'relationship',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'toplist',
                ),
                'post_status' => '',
                'taxonomy' => '',
                'filters' => array(
                    0 => 'search',
                ),
                'return_format' => 'id',
                'min' => '',
                'max' => '',
                'elements' => '',
                'bidirectional' => 0,
                'bidirectional_target' => array(),
            ),
        );
    }
}
