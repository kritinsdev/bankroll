<?php

namespace Bankroll\Blocks\Types\Content;

use Bankroll\Blocks\AbstractBlock;
use Bankroll\Includes\View\Helpers;

class Content extends AbstractBlock
{
    public function __construct(string $block_key)
    {
        parent::__construct($block_key);
    }

    public function prepareData(array|false $data): void
    {
        $this->preparedData['block_content_editor'] = $data['block_content_editor'] ?? null;
        $this->preparedData['enable_image'] = $data['block_content_settings']['enable_image'] ?? false;
        $this->preparedData['image_placement'] = $data['block_content_settings']['image_settings']['image_placement'] ?? 'unset';
        $this->preparedData['image'] = !empty($data['block_content_settings']['image_settings']['image']) ?
            Helpers::prepareImageData($data['block_content_settings']['image_settings']['image']) :
            null;

    }
}
