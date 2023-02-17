<?php 
$slot = $args['data']; 
$provider = $slot->getProvider();
?>

<div class="board__item">
    <h3><?php echo $slot->getName(); ?></h3>
    <p><?php echo $provider->name; ?></p>
</div>