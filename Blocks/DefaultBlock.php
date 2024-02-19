<?php

namespace Bankroll\Blocks;

use Bankroll\Blocks\BlockInterface;
use Bankroll\Includes\Traits\RegisterDefaultFields;

abstract class DefaultBlock implements BlockInterface
{
    use RegisterDefaultFields;

    protected string $view_folder;
    protected array $prepared_data = [];

    public function __construct(
        protected string $block_key,
    ) {
    }

    abstract public function registerSubFields(): array;

    abstract public function prepareData(array|false $block_data): void;

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
