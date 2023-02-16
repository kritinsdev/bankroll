<?php 

namespace Bankroll\Blocks;

class BlocksController {

    public static array $defaultBlockSettings = [
        'block_title' => null,
        'block_subtitle' => null,
        'block_mode' => null
    ];

    public static function show() {
        global $post;

        $blocks = get_field('blocks', $post->ID);

        foreach($blocks as $block) {
            self::resolveBlocks($block['acf_fc_layout'], $block['block_data'], $block['block_settings']);
        }
    }

    public static function resolveBlocks(string $key, array $data, array $settings) {
        unset($settings['block_subtitle']);
        $block = ltrim(strstr($key, '_'), '_');

        $settings = wp_parse_args($settings, self::$defaultBlockSettings);

        get_template_part("parts/blocks/$block", null, ['data' => $data, 'settings' => $settings]);
    }
}