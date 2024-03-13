<?php
if (empty($args['items'])) {
    return;
}
?>

<div class="board board--<?php echo $args['post_type']; ?>">
    <div class="<?php echo $args['post_type']; ?>-items">
        <?php foreach ($args['items'] as $post) : ?>
            <?php get_template_part(
                slug: "Blocks/Board/resources/templates/{$args['post_type']}/{$args['post_type']}-template-1",
                args: $post->toArray()
            ); ?>
        <?php endforeach; ?>
    </div>
</div>