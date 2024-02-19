<?php

namespace Bankroll\Blocks;

use Bankroll\Blocks\BlockInterface;

abstract class DefaultBlock implements BlockInterface
{
    protected string $view_folder;
    protected array $prepared_data = [];

    public function __construct(
        protected string $block_key,
    ) {
    }

    abstract public function registerSubFields(): array;

    abstract public function prepareData(array $block_data): void;

    public function init(): void
    {
        $this->setFolder();
        $this->enqueue();
        $this->registerAjax();
    }

    public function view(): mixed
    {
        return
            get_template_part(
                slug: $this->view_folder,
                args: $this->prepared_data,
            );
    }

    public function register(): array
    {
        return array(
            'key' => "layout_{$this->block_key}_63eac6a9bacc8",
            'name' => "block_{$this->block_key}",
            'label' => ucfirst($this->block_key),
            'display' => 'block',
            'sub_fields' => $this->blockFieldWrapper($this->registerSubFields()),
            'min' => '',
            'max' => '',
        );
    }

    public function blockFieldWrapper(array $sub_fields): array
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
                'sub_fields' => $sub_fields
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

    public function setFolder()
    {
        $folder = ucfirst($this->block_key);
        $this->view_folder = "Blocks/$folder/view";
    }

    public function enqueue(): void
    {
        wp_enqueue_script(
            "{$this->block_key}-js",
            BANKROLL_ASSETS_URL . "{$this->block_key}-js.js",
            array(),
            '1.0.0',
            array(
                'strategy'  => 'defer',
                'in_footer' => true,
            )
        );

        wp_enqueue_style(
            "{$this->block_key}-css",
            BANKROLL_ASSETS_URL . "{$this->block_key}-css.css",
            array(),
            '1.0.0',
        );
    }

    public function registerAjax(): void
    {
    }
}
