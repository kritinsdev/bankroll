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

    public function registerBlockSettingsSubFields(): array
    {
        return array(
            array(
                'key' => "field_{$this->block_key}_63eea9a10d143",
                'label' => 'Title',
                'name' => 'block_title',
                'aria-label' => '',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'maxlength' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
            ),
            array(
                'key' => "field_{$this->block_key}_653ed9933fa31",
                'label' => 'Subtitle',
                'name' => 'block_subtitle',
                'aria-label' => '',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'maxlength' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
            ),
        );
    }

    public function registerSubFields(): array
    {
        return array(
            array(
                'key' => "field_{$this->block_key}_63f7e7951245e",
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
