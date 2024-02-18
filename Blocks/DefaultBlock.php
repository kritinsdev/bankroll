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
            'sub_fields' => $this->registerSubFields(),
            'min' => '',
            'max' => '',
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
