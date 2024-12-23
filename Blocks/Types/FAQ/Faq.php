<?php

namespace Bankroll\Blocks\Types\Faq;

use Bankroll\Blocks\AbstractBlock;

class Faq extends AbstractBlock
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
	}
}
