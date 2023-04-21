<div class="block <?php echo $args['blockType']; ?>">
    <div class="container">
        <?php if ($args['settings']['block_title']): ?>
            <div class="block__title">
                <h2>
                    <?php echo $args['settings']['block_title']; ?>
                </h2>
            </div>
        <?php endif; ?>

        <?php if ($args['settings']['block_content_pre']): ?>
            <div class="block__pre">
                <?php echo $args['settings']['block_content_pre']; ?>
            </div>
        <?php endif; ?>

        <div class="block__content">
            <?php echo $args['template']; ?>
        </div>

        <?php if ($args['settings']['block_content_after']): ?>
            <div class="block__after">
                <?php echo $args['settings']['block_content_after']; ?>
            </div>
        <?php endif; ?>
    </div>
</div>