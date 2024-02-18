<?php

namespace Bankroll\Blocks\Toplist;

use Bankroll\Blocks\BlockInterface;

class Toplist implements BlockInterface
{
    public static string $view = 'Blocks/Toplist/view';

    public static function view(array $block_data): mixed
    {
        return
            get_template_part(
                slug: self::$view,
                args: self::prepareData($block_data),
            );
    }

    public static function prepareData(array $block_data): array
    {
        $prepared_data = [];

        $resourceId = $block_data['block_toplist'][0];
        $items = get_field('test_toplist', $resourceId);

        if (!empty($items)) {
            foreach ($items as $toplist_item_id) {
                $prepared_data['toplist_items'][] = \Bankroll\Includes\Factory\CasinoFactory::create($toplist_item_id);
            }
        }

        return $prepared_data;
    }

    public static function fields(): array
    {
        return array(
            'key' => 'layout_653ed756af2c4',
            'name' => 'block_toplist',
            'label' => 'Toplist',
            'display' => 'block',
            'sub_fields' => array(
                array(
                    'key' => 'field_653ed756af2c5',
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
                    'key' => 'field_653ed756af2c6',
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
                            'key' => 'field_653ed756af2c7',
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
                    ),
                ),
                array(
                    'key' => 'field_653ed756af2c8',
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
                    'key' => 'field_653ed9e297e94',
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
                    'layout' => 'block',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_653ed9e297e95',
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
                            'key' => 'field_653ed9e297e96',
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
                            'key' => 'field_653ed9e297e97',
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
                            'key' => 'field_653ed9e297e98',
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
            ),
            'min' => '',
            'max' => '',
        );
    }
}
