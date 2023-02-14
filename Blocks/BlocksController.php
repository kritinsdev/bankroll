<?php 

namespace Bankroll\Blocks;

class BlocksController {

    public static function show() {
        global $post;

        $blocks = get_field('blocks', $post->ID);

        foreach($blocks as $block) {
            self::resolveBlock($block['acf_fc_layout'], $block);
        }
    }

    public static function resolveBlock(string $key, array $data) {
        switch ($key) {
            case 'block_board':
                self::boardBlock($data);
                break;
            case 'block_content':
                echo 'CONTENT BLOCK';
                break;
            case 'block_faq':
                echo 'FAQ BLOCK';
                break;
            default:
                echo 'default';
                break;
        }

    }

    public static function boardBlock(array $data) {
        var_dump($data);
    }
}