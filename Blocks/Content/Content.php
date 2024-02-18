<?php

namespace Bankroll\Blocks\Content;

use Bankroll\Blocks\BlockInterface;

class Content implements BlockInterface
{
    public static string $view = 'Blocks/Content/view';

    public static function view(array $block_data): mixed
    {
        return
            get_template_part(
                slug: self::$view,
                args: self::prepareData($block_data),
            );
    }

    public static function prepareData(array $data): array
    {
        $prepared_data = [];

        $prepared_data = $data;

        return $prepared_data;
    }

    public static function fields(): array
    {
        return array(
            'key' => 'layout_63f7e58712457',
            'name' => 'block_content',
            'label' => 'Content',
            'display' => 'block',
            'sub_fields' => array(
                array(
                    'key' => 'field_63f7e74b1245c',
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
                    'key' => 'field_63f7e837c85bd',
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
                    'layout' => '',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_63f7e7951245e',
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
                    ),
                ),
                array(
                    'key' => 'field_63f7e7621245d',
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
                    'key' => 'field_653ed9cc97e8f',
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
                            'key' => 'field_653ed9cc97e90',
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
                            'key' => 'field_653ed9cc97e91',
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
                            'key' => 'field_653ed9cc97e92',
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
                            'key' => 'field_653ed9cc97e93',
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
