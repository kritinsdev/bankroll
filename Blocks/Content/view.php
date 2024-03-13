<div class="content-block image-<?php echo $args['image_placement']; ?>">
    <?php if ($args['image_placement'] == 'top' || $args['image_placement'] == 'left') : ?>
        <img src="<?php echo $args['image']['url']; ?>" alt="" class="content-image">
    <?php endif; ?>

    <div class="content-text">
        <?php echo $args['block_content_editor']; ?>
    </div>

    <?php if ($args['image_placement'] == 'bottom' || $args['image_placement'] == 'right') : ?>
        <img src="<?php echo $args['image']['url']; ?>" alt="" class="content-image">
    <?php endif; ?>
</div>