<?php

namespace Bankroll\Blocks\Content;

use Bankroll\Blocks\DefaultBlock;

class Content extends DefaultBlock
{
    public function __construct(string $block_key)
    {
        parent::__construct($block_key);
    }

    public function prepareData(array|false $data): void
    {
        $this->prepared_data = $data;
    }

    public function registerSubFields(): array
    {
        return array(
            array(
                'key' => "field_63f7e7951245e",
                'label' => 'Editor',
                'name' => 'block_content_editor',
                'aria-label' => '',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 0,
            ),
        );
    }
}
