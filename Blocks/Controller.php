<?php 

namespace Bankroll\Core\Blocks;

class Controller {

    public static function show() {
        global $post;

        $blocks = get_field('blocks', $post->ID);

        echo '<pre>';
        print_r($blocks);
        echo '</pre>';

        foreach($blocks as $block) {
            //Display this block
            print_r($block['acf_fc_layout']);
        }
    }
}