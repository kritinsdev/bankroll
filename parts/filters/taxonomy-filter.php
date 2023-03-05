<?php
    if(empty($args['taxonomy'])) {
        exit;
    };

    $taxonomy = $args['taxonomy'];
    $options = !empty($args['options']) ? $args['options'] : null;

    $terms = get_terms($taxonomy, [
        'orderby' => 'name',
        'order' => 'ASC'
    ]);

    if(empty($terms)) {
        return;
    }
?>

<div class="filter" data-filter="<?php echo $taxonomy; ?>">
    <div class="filter__header">
        <span>Filter By <?php echo ucfirst($taxonomy); ?></span>
        <span>
            <svg width="8" height="5" viewBox="0 0 8 5">
                <use xlink:href="#chevron-down" />
            </svg>
        </span>
    </div>
    <div class="filter__data" data-filter-data="<?php echo $taxonomy; ?>">
        <?php foreach ($terms as $term): ?>
            <div class="filter__item" data-term-id="<?php echo $term->term_id; ?>">
                <input type="checkbox" id="<?php echo sprintf('%s_%d', $term->slug, $term->term_id); ?>">
                <label for="<?php echo sprintf('%s_%d', $term->slug, $term->term_id); ?>">
                    <?php echo $term->name; ?>
                </label>
            </div>
        <?php endforeach; ?>
    </div>
</div>