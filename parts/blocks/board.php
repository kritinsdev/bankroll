<?php
$postType = $args['data']['block_board_post_type'];
$typeFactory = 'Bankroll\Includes\Factory\\' . ucfirst($postType) . 'Factory';
$showAll = $args['data']['block_board_show_all'];
$postIds = $args['data']['block_board_' . $postType];

if ($showAll) {
    $postIds = get_posts([
        'post_type' => $postType,
        'numberposts' => -1
    ]);
}
$maxPostsCount = 12; //TODO : add setting?
$showLoadMore = count($postIds) > $maxPostsCount;
?>

<div class="board">
    <div class="boardItems">
        <?php foreach ($postIds as $itemCount => $id):
            $post = $typeFactory::create($id); ?>

            <?php if ($itemCount < $maxPostsCount): ?>
                <?php get_template_part('parts/blocks/board/board-' . $postType, null, ['data' => $post]); ?>
            <?php endif; ?>
        <?php endforeach; ?>

    </div>
    <?php if ($showLoadMore): ?>
        <div id="boardLoadMore" class="boardLoadMore" data-remaining-posts="[1,2,3,4,5]">
            <button>Load More</button>
        </div>
    <?php endif; ?>
</div>