<?php
$slot = $args['data'];
$image = $slot->getImage();
$provider = $slot->getProvider();
?>

<div class="board__item <?php if (isset($args['carousel']))
    echo 'splide__slide'; ?> slot">
    <div class="slot__image">
        <img src="<?php echo $image['url']; ?>" alt="">
    </div>
    <div class="slot__details">
        <div>
            <div class="slot__title"><?php echo $slot->getName(); ?></div>
            <div class="slot__provider"><?php foreach($provider as $prov) echo $prov; ?></div>
        </div>
    </div>
</div>