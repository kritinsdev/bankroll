<?php

if (empty($args['items'])) {
    return;
}
?>

<div class="board">
    <div class="board__items" id="boardItems">
        <?php foreach ($args['items'] as $post) : ?>
            <?php get_template_part(
                slug: "Blocks/Board/templates/{$args['post_type']}/template-1",
                args: $post
            ); ?>
        <?php endforeach; ?>
    </div>
    <!-- Components::loadMoreButton($showLoadMore, $remainingPosts); -->
</div>