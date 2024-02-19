<?php

namespace Bankroll\Includes\Traits;

trait RegisterDefaultFields
{
    public function register(): array
    {
        $data = array(
            'key' => "layout_{$this->block_key}_63eac6a9bacc8",
            'name' => "block_{$this->block_key}",
            'label' => ucfirst($this->block_key),
            'display' => 'block',
            'sub_fields' => array(
                array(
                    'key' => "field_{$this->block_key}_63eea9090d141",
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
                    'key' => "field_{$this->block_key}_63eeb98701365",
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
                    'sub_fields' => $this->registerSubFields()
                ),
                array(
                    'key' => "field_{$this->block_key}_63eea9620d142",
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
                    'key' => "field_{$this->block_key}_63eeaafb4a63f",
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
                            'key' => "field_{$this->block_key}_63eea9c70d144",
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
                            'key' => "field_{$this->block_key}_63f158bd5cf63",
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

        return $data;
    }

    public function registerSubFields(): array
    {
        return $this->defaultRegisterSubFields();
    }

    protected function defaultRegisterSubFields(): array
    {
        return [];
    }
}
