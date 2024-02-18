<?php

namespace Bankroll\Blocks\Board;

use Bankroll\Blocks\DefaultBlock;

class Board extends DefaultBlock
{
    public function __construct(string $block_key)
    {
        parent::__construct($block_key);
    }

    public function prepareData(array $block_data): array
    {
        $prepared_data = [];
        $resource_ids = $block_data['block_board_' . $block_data['block_board_post_type'] . '_items'];
        $factory = 'Bankroll\Includes\Factory\\' . ucfirst($block_data['block_board_post_type']) . 'Factory';

        $prepared_data['post_type'] = $block_data['block_board_post_type'];
        $prepared_data['show_all'] = $block_data['block_board_show_all'];

        if (!empty($resource_ids)) {
            foreach ($resource_ids as $id) {
                $prepared_data['items'][] = $factory::create($id);
            }
        }

        return $prepared_data;
    }

    public function registerSubFields(): array
    {
        return array(
            array(
                'key' => 'field_63eea9090d141',
                'label' => 'Data',
                'name' => '',
                'aria-label' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placement' => 'top',
                'endpoint' => 0,
            ),
            array(
                'key' => 'field_63eeb98701365',
                'label' => 'Block Data',
                'name' => 'block_data',
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
                        'key' => 'field_63eac79dbaccb',
                        'label' => 'Type',
                        'name' => 'block_board_post_type',
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
                            'casino' => 'Casino',
                            'bonus' => 'Bonus',
                        ),
                        'default_value' => false,
                        'return_format' => 'value',
                        'multiple' => 0,
                        'allow_null' => 0,
                        'ui' => 0,
                        'ajax' => 0,
                        'placeholder' => '',
                    ),
                    array(
                        'key' => 'field_63eeafd3ed04f',
                        'label' => 'Select Casinos',
                        'name' => 'block_board_casino_items',
                        'aria-label' => '',
                        'type' => 'relationship',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_63eac79dbaccb',
                                    'operator' => '==',
                                    'value' => 'casino',
                                ),
                            ),
                        ),
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'post_type' => array(
                            0 => 'casino',
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
                    array(
                        'key' => 'field_65b4ef2b7566f',
                        'label' => 'Select Bonuses',
                        'name' => 'block_board_bonus_items',
                        'aria-label' => '',
                        'type' => 'relationship',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_63eac79dbaccb',
                                    'operator' => '==',
                                    'value' => 'bonus',
                                ),
                            ),
                        ),
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'post_type' => array(
                            0 => 'bonus',
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
                    array(
                        'key' => 'field_63f1eafbac92b',
                        'label' => 'Show All Posts',
                        'name' => 'block_board_show_all',
                        'aria-label' => '',
                        'type' => 'true_false',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '33.3',
                            'class' => '',
                            'id' => '',
                        ),
                        'message' => '',
                        'default_value' => 0,
                        'ui_on_text' => '',
                        'ui_off_text' => '',
                        'ui' => 1,
                    ),
                ),
            ),
            array(
                'key' => 'field_63eea9620d142',
                'label' => 'Block Settings',
                'name' => '',
                'aria-label' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placement' => 'top',
                'endpoint' => 0,
            ),
            array(
                'key' => 'field_63eeaafb4a63f',
                'label' => 'Block Settings',
                'name' => 'block_settings',
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
                'layout' => '',
                'sub_fields' => array(
                    array(
                        'key' => 'field_63eea9a10d143',
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
                        'key' => 'field_653ed9933fa31',
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
                        'key' => 'field_63eea9c70d144',
                        'label' => 'Content Before',
                        'name' => 'block_content_before',
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
                    array(
                        'key' => 'field_63f158bd5cf63',
                        'label' => 'Content After',
                        'name' => 'block_content_after',
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
                ),
            ),
        );
    }
}
