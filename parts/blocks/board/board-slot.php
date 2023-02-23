<?php
$slot = $args['data'];
$image = $slot->getImage();
$provider = $slot->getProvider();
?>

<div class="board__item <?php if(isset($args['carousel'])) echo 'splide__slide'; ?> slot">
    <div class="slot__image">
        <img src="<?php echo $image['url']; ?>" alt="">
    </div>
    <div class="slot__details">
        <a href="<?php echo $slot->getPermalink(); ?>">
            <?php echo $slot->getName(); ?>
        </a>
        <span>
            <?php foreach($provider as $prov) echo $prov; ?>
        </span>
        <span>Max Multiplier: <?php echo $slot->getMaxMultiplier(); ?>x</span>
    </div>
</div>