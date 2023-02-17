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
        <span>
            <?php echo $slot->getName(); ?>
        </span>
        <p>
            <?php echo $provider->name; ?>
        </p>

    </div>
</div>