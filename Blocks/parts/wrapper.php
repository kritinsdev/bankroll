<div class="py-8 block <?php echo $args['class']; ?>">
    <div class="w-full mx-auto max-w-[1240px] px-4 md:px-0">
        <?php if (!empty($args['settings']['block_title'])) : ?>
            <h2 class="text-[32px] leading-none mb-1 font-bold">
                <?php echo $args['settings']['block_title']; ?>
            </h2>
        <?php endif; ?>

        <?php if (!empty($args['settings']['block_subtitle'])) : ?>
            <p class="text-[16px] text-gray-700 mb-4">
                <?php echo $args['settings']['block_subtitle']; ?>
            </p>
        <?php endif; ?>

        <?php if (!empty($args['settings']['block_content_before'])) : ?>
            <div class="mb-4">
                <?php echo $args['settings']['block_content_before']; ?>
            </div>
        <?php endif; ?>

        <?php echo $args['template']; ?>

        <?php if (!empty($args['settings']['block_content_after'])) : ?>
            <div class="mt-4">
                <?php echo $args['settings']['block_content_after']; ?>
            </div>
        <?php endif; ?>
    </div>
</div>