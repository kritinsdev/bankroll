<?php

use Bankroll\Includes\View\Components;

// dump($args['data'], true);

$postType = $args['data']['post_type'];
$typeFactory = 'Bankroll\Includes\Factory\\' . ucfirst($postType) . 'Factory';
$showAll = $args['data']['show_all'];
$posts = !empty($args['data']['items']) ? $args['data']['items'] : [];
?>

<div class="board">
    <div class="board__items" id="boardItems">
        <?php foreach ($posts as $post) : ?>
            <?php get_template_part("Blocks/Board/templates/$postType/template-1", null, ['data' => $post]); ?>
        <?php endforeach; ?>
    </div>

    <!-- Components::loadMoreButton($showLoadMore, $remainingPosts); -->
</div>