<?php
$slot = $args['data'];
$image = $slot->getImage();
?>

<div class="board__item <?php if(isset($args['carousel'])) echo 'splide__slide'; ?> slot">
    <div class="slot__image">
        <img src="<?php echo $image['url']; ?>" alt="">
    </div>
    <div class="slot__details">
        <a href="<?php echo $slot->getPermalink(); ?>">
            <?php echo $slot->getName(); ?>
        </a>
        <p>
            PROVIDER
        </p>
        <p>Max Multiplier: <?php echo $slot->getMaxMultiplier(); ?>x</p>
    </div>
</div>