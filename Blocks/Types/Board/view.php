<?php
if (empty($args['items'])) {
    return;
}
?>

<div class="board board--<?php echo $args['post_type']; ?>">
    <div class="flex gap-4">
        <?php foreach ($args['items'] as $post) : ?>
            <?php get_template_part(
                slug: "Blocks/Types/Board/resources/templates/{$args['post_type']}/{$args['post_type']}-template-1",
                args: $post->toArray()
            ); ?>
        <?php endforeach; ?>
    </div>
</div>