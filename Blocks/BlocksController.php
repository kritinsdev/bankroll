<?php

namespace Bankroll\Blocks;

class BlocksController
{
    public function __construct(
        public \WP_Post|int $post
    ) {
        $this->setDefaults();
    }

    public function printBlocks(): void
    {
        $postId = $this->resolvePostId();

        $blocks = get_field('blocks', $postId);

        if (!empty($postId) && !empty($blocks)) {
            foreach ($blocks as $block_data) {
                $this->resolveBlock($block_data);
            }
        }
    }


    private function resolveBlock(array $data): void
    {
        $block_data = $this->resolveBlockData($data);
        $class = "Bankroll\Blocks\\{$block_data['layout']['folder']}";

        if (class_exists($class)) {
            $class = new $class(
                $block_data['layout']['block'],
            );

            $class->init();
            $class->prepareData($block_data['block_data']);

            ob_start();

            $class->view();

            $template = ob_get_clean();

            $this->wrapBlock(
                $template,
                $block_data['layout']['class'],
                $block_data['block_settings']
            );
        } else {
            "$class doesnt exist";
        }
    }

    private function wrapBlock(string $template, string $class, ?array $settings): void
    {
        get_template_part('Blocks/parts/wrapper', null, [
            'template' => $template,
            'settings' => $settings,
            'class' => $class
        ]);
    }

    private function resolveBlockData(array $data): array
    {
        $resolved_data = [];

        $folder = ucfirst(ltrim(strstr($data['acf_fc_layout'], '_'), '_'));
        $resolved_data['layout'] = [
            'block' => str_replace('block_', '', $data['acf_fc_layout']),
            'folder' => "$folder\\$folder",
            'class' => str_replace('_', '-', $data['acf_fc_layout']),
        ];

        $resolved_data['block_data'] = $data['block_data'];
        $resolved_data['block_settings'] = $data['block_settings'];

        return $resolved_data;
    }

    private function resolvePostId(): ?int
    {
        $id = null;

        if (is_int($this->post)) {
            $id = $this->post;
        }

        if ($this->post instanceof \WP_Post) {
            $id = $this->post->ID;
        }

        return $id;
    }

    private function setDefaults()
    {
    }
}
