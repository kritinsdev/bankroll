<?php

namespace Bankroll\Blocks;

use WP_Post;
use WP_Taxonomy;
use WP_Term;

class BlocksController
{
    public function __construct(
        public WP_Post|int $post
    ) {
        $this->setDefaults();
    }

    public function printBlocks(): void
    {
        $postId = $this->resolveId();

        $blocks = get_field('blocks', $postId);

        if (!empty($postId) && !empty($blocks)) {
            foreach ($blocks as $blockData) {
                $this->resolveBlock($blockData);
            }
        }
    }


    private function resolveBlock(array $data): void
    {
        $blockData = $this->resolveBlockData($data);

        if (file_exists(BANKROLL_DIR . "/Blocks/{$blockData['layout']['folder']}/front.php")) {
            ob_start();

            get_template_part("Blocks/{$blockData['layout']['folder']}/front", null, [
                'data' => $blockData['block_data']
            ]);

            $template = ob_get_clean();

            $this->wrapBlock($template, $blockData['layout']['class'], $blockData['block_settings']);
        } else {
            // echo $block . " doesnt exist";
        }
    }

    private function wrapBlock(string $template, string $class, ?array $settings): void
    {
        get_template_part('Blocks/blockParts/wrapper', null, [
            'template' => $template,
            'settings' => $settings,
            'class' => $class
        ]);
    }

    private function resolveBlockData(array $data): array
    {
        $blockData = [];
        $blockData['layout'] = [
            'acf_layout' => $data['acf_fc_layout'],
            'folder' => ucfirst(ltrim(strstr($data['acf_fc_layout'], '_'), '_')),
            'class' => str_replace('_', '-', $data['acf_fc_layout']),
        ];

        $blockData['block_data'] = $data['block_data'];
        $blockData['block_settings'] = $data['block_settings'];


        return $blockData;
    }

    private function resolveId(): ?int
    {
        $id = null;

        if (is_int($this->post)) {
            $id = $this->post;
        }

        if ($this->post instanceof WP_Post) {
            $id = $this->post->ID;
        }

        return $id;
    }

    private function setDefaults()
    {
    }
}
