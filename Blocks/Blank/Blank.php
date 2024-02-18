<?php

namespace Bankroll\Blocks\Blank;

use Bankroll\Blocks\BlockInterface;

class Blank implements BlockInterface
{
    private string $block = 'blank';
    private string $view_folder = 'Blocks/Blank/view';

    public function __construct()
    {
    }

    public function init(): void
    {
        $this->enqueue();
        $this->registerAjax();
    }

    public function view(array $block_data): mixed
    {
        return
            get_template_part(
                slug: $this->view_folder,
                args: $this->prepareData($block_data),
            );
    }

    public function prepareData(array $block_data): array
    {
        $prepared_data = [];

        return $prepared_data;
    }

    public function setAcfFields(): array
    {
        return array(
            'key' => "layout_{$this->block}_63eac6a9bacc8",
            'name' => "block_{$this->block}",
            'label' => ucfirst($this->block),
            'display' => 'block',
            'sub_fields' => array(),
            'min' => '',
            'max' => '',
        );
    }

    public function enqueue(): void
    {
        wp_enqueue_script(
            "{$this->block}-js",
            BANKROLL_ASSETS_URL . "{$this->block}-js.js",
            array(),
            '1.0.0',
            array(
                'strategy'  => 'defer',
                'in_footer' => true,
            )
        );

        wp_enqueue_style(
            "{$this->block}-css",
            BANKROLL_ASSETS_URL . "{$this->block}-css.css",
            array(),
            '1.0.0',
        );
    }

    public function registerAjax(): void
    {
    }
}
