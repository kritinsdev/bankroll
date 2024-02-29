<div>
    <?php
    foreach ($args['toplist_items'] as $item) {
        get_template_part(
            slug: 'Blocks/Toplist/templates/template-1',
            args: $item->toArray(),
        );
    }
    ?>
</div>