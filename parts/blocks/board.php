<?php
$postType = $args['data']['block_board_post_type'];
$mode = (!isset($args['data']['block_board_mode'])) ? 'default' : $args['data']['block_board_mode'];
$typeFactory = 'Bankroll\Includes\Factory\\' . ucfirst($postType) . 'Factory';
$showAll = $args['data']['block_board_show_all'];
$postIds = $args['data']['block_board_' . $postType];
$cardStyle = "1"; // TODO : add setting for style
$cardTemplate = "parts/cards/$postType/card-$cardStyle";

if ($showAll) {
    $postIds = get_posts([
        'post_type' => $postType,
        'numberposts' => -1
    ]);
}

$showLoadMore = false;
$maxPostsCount = 15; //TODO : add setting?
$remainingPosts = [];

if(count($postIds) > $maxPostsCount) {
    $showLoadMore = true;
    $remainingPosts[] = [];
}
?>

<div class="board">
    <?php if ($mode === 'carousel'): ?>
        <div class="splide" aria-label="Basic carousel">
            <div class="splide__track">
                <div class="splide__list">
                    <?php foreach ($postIds as $itemCount => $id):
                        $post = $typeFactory::create($id); ?>
                        <?php if ($itemCount < $maxPostsCount): ?>
                            <?php get_template_part($cardTemplate, null, ['data' => $post, 'carousel' => true]); ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    <?php else: ?>
        <div class="board__items" id="boardItems">
            <?php foreach ($postIds as $itemCount => $id):
                $post = $typeFactory::create($id); ?>
                <?php if ($itemCount < $maxPostsCount): ?>
                    <?php get_template_part($cardTemplate, null, ['data' => $post]); ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if ($showLoadMore): ?>
        <div id="boardLoadMore" class="board__loadMore" data-remaining-posts="[1,2,3,4,5]">
            <button id="loadMore">Load More</button>
        </div>
    <?php endif; ?>
</div>