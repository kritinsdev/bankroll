<?php
$postType = $args['data']['block_board_post_type'];
$postIds = $args['data']['block_board_' . $postType];
$typeFactory = 'Bankroll\Includes\Factory\\' . ucfirst($postType) . 'Factory';

?>

<div class="board">
    <?php foreach ($postIds as $id):
        $post = $typeFactory::create($id); ?>
        <?php get_template_part('parts/blocks/board/board-' . $postType, null, ['data' => $post]); ?>
    <?php endforeach; ?>
</div>