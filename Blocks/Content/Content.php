<?php

namespace Bankroll\Blocks\Content;

use Bankroll\Blocks\DefaultBlock;
use Bankroll\Includes\Helpers;

class Content extends DefaultBlock
{
    public function __construct(string $block_key)
    {
        parent::__construct($block_key);
    }

    public function prepareData(array|false $data): void
    {
        $this->prepared_data['block_content_editor'] = $data['block_content_editor'];
        $this->prepared_data['enable_image'] = $data['block_content_settings']['enable_image'];
        $this->prepared_data['image'] = Helpers::parseImageArray($data['block_content_settings']['image_settings']['image']);
        $this->prepared_data['image_placement'] = $data['block_content_settings']['image_settings']['image_placement'];
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
            array(
                'key' => "field_{$this->block_key}_65db908a33ade",
                'label' => 'Color picker',
                'name' => 'block_background_color',
                'aria-label' => '',
                'type' => 'color_picker',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'enable_opacity' => 0,
                'return_format' => 'string',
            ),
        );
    }

    public function registerSubFields(): array
    {
        return array(
            array(
                'key' => 'field_65dba171713dc',
                'label' => 'Settings',
                'name' => 'block_content_settings',
                'aria-label' => '',
                'type' => 'group',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_65dba219713dd',
                        'label' => 'Set Image',
                        'name' => 'enable_image',
                        'aria-label' => '',
                        'type' => 'true_false',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'message' => '',
                        'default_value' => 0,
                        'ui_on_text' => '',
                        'ui_off_text' => '',
                        'ui' => 1,
                    ),
                    array(
                        'key' => 'field_65dba4ce713df',
                        'label' => 'Settings',
                        'name' => 'image_settings',
                        'aria-label' => '',
                        'type' => 'group',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_65dba219713dd',
                                    'operator' => '==',
                                    'value' => '1',
                                ),
                            ),
                        ),
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_65dba5c5713e2',
                                'label' => 'Image',
                                'name' => 'image',
                                'aria-label' => '',
                                'type' => 'image',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'return_format' => 'array',
                                'library' => 'all',
                                'min_width' => '',
                                'min_height' => '',
                                'min_size' => '',
                                'max_width' => '',
                                'max_height' => '',
                                'max_size' => '',
                                'mime_types' => '',
                                'preview_size' => 'thumbnail',
                            ),
                            array(
                                'key' => 'field_65dba566713e1',
                                'label' => 'Image Placement',
                                'name' => 'image_placement',
                                'aria-label' => '',
                                'type' => 'select',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'choices' => array(
                                    'left' => 'Left',
                                    'right' => 'Right',
                                    'top' => 'Top',
                                    'bottom' => 'Bottom'
                                ),
                                'default_value' => false,
                                'return_format' => 'value',
                                'multiple' => 0,
                                'allow_null' => 0,
                                'ui' => 0,
                                'ajax' => 0,
                                'placeholder' => '',
                            ),
                        ),
                    ),
                ),
            ),
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
