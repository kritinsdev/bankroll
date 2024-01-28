<?php

namespace Bankroll\Blocks;

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
            foreach ($blocks as $blockData) {
                $this->resolveBlock($blockData);
            }
        } else {
            dump('Something went wrong');
        }
    }


    private function resolveBlock(array $data): void
    {
        $blockData = $this->resolveData($data);

        if (file_exists(BANKROLL_DIR . "/Blocks/{$blockData['layout']['folder']}/front.php")) {
            ob_start();

            get_template_part("Blocks/{$blockData['layout']['folder']}/front", null, [
                'data' => $this->prepareBlockData($blockData),
            ]);

            $template = ob_get_clean();

            $this->wrapBlock($template, $blockData['layout']['class'], $blockData['block_settings']);
        } else {
            echo $blockData['layout']['acf_layout'] . " doesnt exist";
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
                    $block_data['toplist_items'] = $items;
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
        // dump($data);
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

        dump($board_data);

        return $board_data;
    }

    private function setDefaults()
    {
    }
}
