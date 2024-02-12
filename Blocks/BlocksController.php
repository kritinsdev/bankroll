<?php

namespace Bankroll\Blocks;

use Bankroll\Includes\Factory\CasinoFactory;
use Bankroll\Includes\Resource\Casino;
use WP_Post;

class BlocksController
{
    public function __construct(
        public WP_Post|int $post
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
        $block_data = $this->resolveData($data);

        if (file_exists(BANKROLL_DIR . "/Blocks/{$block_data['layout']['folder']}/front.php")) {
            ob_start();

            get_template_part(
                slug: "Blocks/{$block_data['layout']['folder']}/front",
                args: $this->prepareBlockData($block_data)
            );

            $template = ob_get_clean();

            $this->wrapBlock($template, $block_data['layout']['class'], $block_data['block_settings']);
        } else {
            echo $block_data['layout']['acf_layout'] . " doesnt exist";
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

    private function resolveData(array $data): array
    {
        $block_data = [];
        $block_data['layout'] = [
            'acf_layout' => $data['acf_fc_layout'],
            'folder' => ucfirst(ltrim(strstr($data['acf_fc_layout'], '_'), '_')),
            'class' => str_replace('_', '-', $data['acf_fc_layout']),
        ];

        $block_data['block_data'] = $data['block_data'];
        $block_data['block_settings'] = $data['block_settings'];

        return $block_data;
    }

    private function resolvePostId(): ?int
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

    private function prepareBlockData(array $data): array
    {
        $block_data = [];

        // TODO : move logic somewhere
        switch ($data['layout']['acf_layout']) {
            case 'block_content':
                $block_data = $data['block_data'];
                break;
            case 'block_toplist':
                $resourceId = $data['block_data']['block_toplist'][0];
                $items = get_field('test_toplist', $resourceId);

                if (!empty($items)) {
                    foreach ($items as $toplist_item_id) {
                        $block_data['toplist_items'][] = CasinoFactory::create($toplist_item_id);
                    }
                }
                break;
            case 'block_board':
                $block_data = $this->boardData($data['block_data']);
                break;
        }

        return $block_data;
    }

    private function boardData(array $data): array
    {
        $board_data = [];
        $resource_ids = $data['block_board_' . $data['block_board_post_type'] . '_items'];
        $factory = 'Bankroll\Includes\Factory\\' . ucfirst($data['block_board_post_type']) . 'Factory';

        $board_data['post_type'] = $data['block_board_post_type'];
        $board_data['show_all'] = $data['block_board_show_all'];

        if (!empty($resource_ids)) {
            foreach ($resource_ids as $id) {
                $board_data['items'][] = $factory::create($id);
            }
        }

        return $board_data;
    }

    private function setDefaults()
    {
    }
}
