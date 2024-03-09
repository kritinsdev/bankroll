<?php

namespace Bankroll\Blocks\Board;

use Bankroll\Blocks\DefaultBlock;

class Board extends DefaultBlock
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

        $resource_ids = $block_data['block_board_' . $block_data['block_board_post_type'] . '_items'];
        $factory = 'Bankroll\Includes\Factory\\' . ucfirst($block_data['block_board_post_type']) . 'Factory';

        $this->prepared_data['post_type'] = $block_data['block_board_post_type'];
        $this->prepared_data['show_all'] = $block_data['block_board_show_all'];

        if (!empty($resource_ids)) {
            foreach ($resource_ids as $id) {
                $this->prepared_data['items'][] = $factory::create($id);
            }
        }
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
            ),
            array(
                'key' => "field_{$this->block_key}_653ed9933fa31",
                'label' => 'Subtitle',
                'name' => 'block_subtitle',
                'aria-label' => '',
                'type' => 'text',
            ),
            array(
                'key' => "field_{$this->block_key}_65db908a33ade",
                'label' => 'Color picker',
                'name' => 'block_background_color',
                'aria-label' => '',
                'type' => 'color_picker',
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
                'key' => "field_{$this->block_key}_63eac79dbaccb",
                'label' => 'Type',
                'name' => 'block_board_post_type',
                'aria-label' => '',
                'type' => 'select',
                'choices' => array(
                    'casino' => 'Casino',
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
                'key' => "field_{$this->block_key}_63eeafd3ed04f",
                'label' => 'Select Casinos',
                'name' => 'block_board_casino_items',
                'aria-label' => '',
                'type' => 'relationship',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => "field_{$this->block_key}_63eac79dbaccb",
                            'operator' => '==',
                            'value' => 'casino',
                        ),
                    ),
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
                'key' => "field_{$this->block_key}_65b4ef2b7566f",
                'label' => 'Select Bonuses',
                'name' => 'block_board_bonus_items',
                'aria-label' => '',
                'type' => 'relationship',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => "field_{$this->block_key}_63eac79dbaccb",
                            'operator' => '==',
                            'value' => 'bonus',
                        ),
                    ),
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
                'key' => "field_{$this->block_key}_63f1eafbac92b",
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
        );
    }
}
