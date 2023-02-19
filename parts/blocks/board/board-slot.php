<?php
$slot = $args['data'];
$provider = $slot->getProvider();
$image = $slot->getImage();
?>

<div class="boardSlot">
    <div class="boardSlot__image">
        <img src="<?php echo $image['url']; ?>" alt="">
    </div>
    <div class="boardSlot__details">
        <a href="<?php echo $slot->getPermalink(); ?>">
            <?php echo $slot->getName(); ?>
        </a>
        <p>
            <?php echo $provider->name; ?>
        </p>
        <p>Max Multiplier: <?php echo $slot->getMaxMultiplier(); ?>x</p>
    </div>
</div>