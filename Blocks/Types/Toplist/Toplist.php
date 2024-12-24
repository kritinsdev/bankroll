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

    public function prepareData(array|false $data): void
    {
        if (empty($data)) {
            return;
        }

        $resourceId = $data['block_toplist'][0];
        $items = get_field('toplist_items', $resourceId);
		$specificEnabled = get_field('toplist_specific_type', $resourceId);

        if (!$specificEnabled && !empty($items)) {
            foreach ($items as $id) {
				$casino = CasinoFactory::create($id);

                $this->preparedData['toplist_items'][] = $casino;
            }
        }

		if($specificEnabled) {
			$allCasinos = get_posts([
				'fields'          => 'ids',
				'posts_per_page'  => -1,
				'post_type' => 'casino'
			]);

			$bonusType = get_field('toplist_bonus_type', $resourceId);

			$this->preparedData['bonus_type'] = $bonusType;

			foreach ($allCasinos as $id) {
				$casino = CasinoFactory::create($id);

				$bonuses = $casino->getBonuses();

				if(array_key_exists($bonusType, $bonuses)) {
					$this->preparedData['toplist_items'][] = $casino;
				}
			}
		}
    }
}
