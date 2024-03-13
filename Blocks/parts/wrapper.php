<div class="block <?php echo $args['class']; ?>" <?php echo $args['background_color']; ?>>
    <div class="container-narrow">
        <?php if (!empty($args['settings']['block_title'])) : ?>
            <div class="block-title">
                <h2>
                    <?php echo $args['settings']['block_title']; ?>
                </h2>
            </div>
        <?php endif; ?>

        <?php if (!empty($args['settings']['block_subtitle'])) : ?>
            <div class="block-subtitle">
                <span>
                    <?php echo $args['settings']['block_subtitle']; ?>
                </span>
            </div>
        <?php endif; ?>

        <?php if (!empty($args['settings']['block_content_before'])) : ?>
            <div class="block-content-before">
                <?php echo $args['settings']['block_content_before']; ?>
            </div>
        <?php endif; ?>

        <div class="block-content-field">
            <?php echo $args['template']; ?>
        </div>

        <?php if (!empty($args['settings']['block_content_after'])) : ?>
            <div class="block-content-after">
                <?php echo $args['settings']['block_content_after']; ?>
            </div>
        <?php endif; ?>
    </div>
</div>