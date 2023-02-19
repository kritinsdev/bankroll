<?php
$postType = $args['data']['block_board_post_type'];
$mode = $args['data']['block_board_mode'];
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

<div class="board carousel">
    <div class="board__items">
        <?php foreach ($postIds as $itemCount => $id):
            $post = $typeFactory::create($id); ?>
            <?php if($mode === 'default') : ?>
                <?php if ($itemCount < $maxPostsCount): ?>
                    <?php get_template_part('parts/blocks/board/board-' . $postType, null, ['data' => $post]); ?>
                <?php endif; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <?php if ($showLoadMore): ?>
        <div id="boardLoadMore" class="board__loadMore" data-remaining-posts="[1,2,3,4,5]">
            <button>Load More</button>
        </div>
    <?php endif; ?>
</div>




<div class="boardCarousel">
        <div class="boardCarousel__container">
            <div class="boardCarousel__slide">Slide 1</div>
            <div class="boardCarousel__slide">Slide 2</div>
            <div class="boardCarousel__slide">Slide 3</div>
        </div>
</div>