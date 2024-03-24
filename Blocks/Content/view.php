<?php

use Bankroll\Includes\View\Components;

?>

<div class="content-block image-<?php echo $args['image_placement']; ?>">
    <?php if ($args['image_placement'] == 'top' || $args['image_placement'] == 'left') : ?>
        <?php Components::image($args['image'], ['content-image']); ?>
    <?php endif; ?>

    <div class="content-text">
        <?php echo $args['block_content_editor']; ?>
    </div>

    <?php if ($args['image_placement'] == 'bottom' || $args['image_placement'] == 'right') : ?>
        <?php Components::image($args['image'], ['content-image']); ?>
    <?php endif; ?>
</div>