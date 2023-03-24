<?php 

namespace Bankroll\Blocks;

class BlocksController {

    public static array $defaultBlockSettings = [
        'block_mode' => null,
        'block_title' => null,
        'block_content_pre' => null,
        'block_content_after' => null,
    ];

    public static function blocks()
    {
        global $post;
        $post = isset($post->ID) ? $post->ID : get_queried_object();
        $blocks = get_field('blocks', $post);

        if ($blocks) {
            foreach ($blocks as $block) {
                self::resolveBlock($block['acf_fc_layout'], $block['block_data'], $block['block_settings']);
            }
        }
    }

    public static function block(string $layout, array $data, ?array $settings = [])
    {   
        self::resolveBlock($layout, $data, $settings);
    }

    public static function resolveBlock(string $layout, array|bool $data, ?array $settings = []) {
        $block = ltrim(strstr($layout, '_'), '_');
        $settings = wp_parse_args($settings, self::$defaultBlockSettings);

        ob_start();
        get_template_part("parts/blocks/$block", null, ['data' => $data]);
        $template = ob_get_clean();

        self::blockWrapper($template, $block, $settings);
    }



    public static function blockWrapper(string $template, string $blockType, ?array $settings) {
        get_template_part('parts/blocks/wrapper', null, [
            'template' => $template, 
            'settings' => $settings,
            'blockType' => $blockType
        ]);
    }
}