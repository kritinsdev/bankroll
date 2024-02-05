<?php

use Bankroll\Includes\View\Components;

// dump($args['data'], true);

$postType = $args['data']['post_type'];
$typeFactory = 'Bankroll\Includes\Factory\\' . ucfirst($postType) . 'Factory';
$showAll = $args['data']['show_all'];
// $postIds = $args['data']['block_board_' . $postType];
// $cardTemplate = "parts/cards/$postType/card-$cardStyle";


if ($showAll) {
    $postIds = get_posts([
        'post_type' => $postType,
        'numberposts' => -1
    ]);
}

$showLoadMore = false;
$maxPostsCount = 15; //TODO : add setting?
$remainingPosts = [];

if (count($postIds) > $maxPostsCount) {
    $showLoadMore = true;
    $remainingPosts = array_splice($postIds, $maxPostsCount);
}
?>

<div class="board">
    <div class="board__items" id="boardItems">
        <?php foreach ($postIds as $itemCount => $id) :
            $post = $typeFactory::create($id); ?>
            <?php if ($itemCount < $maxPostsCount) : ?>
                <?php get_template_part($cardTemplate, null, ['data' => $post]); ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

    <?php if ($showLoadMore && !empty($remainingPosts)) {
        Components::loadMoreButton($showLoadMore, $remainingPosts);
    } ?>
</div>