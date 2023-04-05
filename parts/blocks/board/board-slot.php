<?php
$slot = $args['data'];
$image = $slot->getImage();
$provider = $slot->getProvider();
?>

<div class="board__item <?php if(isset($args['carousel'])) echo 'splide__slide'; ?> slot">
    <div class="slot__image">
        <img src="<?php echo $image['url']; ?>" alt="">
    </div>

</div>