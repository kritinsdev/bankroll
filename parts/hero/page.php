<?php

use Bankroll\Includes\View\Components;

$hero = $args;

?>
<div class="hero" style="background-image:url('<?php echo $hero['background_image'][0]; ?>')">
    <div class="hero-wrap">
        <div class="hero-main">
            <h1 class="hero-title">
                <?php echo $hero['title']; ?>
            </h1>
            <div class="hero-text">
                <?php echo $hero['text']; ?>
            </div>

            <div>
                <?php Components::image($hero['image']); ?>
            </div>
        </div>
    </div>
</div>