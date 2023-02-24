<?php 

namespace Bankroll\Blocks;

class BlocksController {

    public static array $defaultBlockSettings = [
        'block_mode' => null,
        'block_title' => null,
        'block_content_pre' => null,
        'block_content_after' => null,
    ];

    public static function show() {
        global $post;

        $blocks = get_field('blocks', $post->ID);

        if ($blocks) {
            foreach ($blocks as $block) {
                self::resolveBlocks($block['acf_fc_layout'], $block['block_data'], $block['block_settings']);
            }
        }
    }

    public static function resolveBlocks(string $key, array|bool $data, array|bool $settings) {
        $block = ltrim(strstr($key, '_'), '_');
        $settings = wp_parse_args($settings, self::$defaultBlockSettings);

        ob_start();
        get_template_part("parts/blocks/$block", null, ['data' => $data]);
        $template = ob_get_clean();

        self::blockWrapper($template, $settings, $block);
    }

    public static function blockWrapper(string $template, array $settings, string $blockType) {
        get_template_part('parts/blocks/wrapper', null, [
            'template' => $template, 
            'settings' => $settings,
            'blockType' => $blockType
        ]);
    }
}