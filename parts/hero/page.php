<?php

use Bankroll\Includes\View\Components;

$hero = $args;

echo '<pre>';

print_r($hero);

echo '</pre>';

?>
<div class="hero" style="background-image:url('<?php echo $hero['background_image'][0]; ?>')">
    <div class="hero__wrap">
        <div class="hero__main">
            <div class="hero__info">
                <h1 class="hero__title">
                    <?php echo $hero['title']; ?>
                </h1>
                <div class="hero__text">
                    <?php echo $hero['text']; ?>
                </div>
            </div>

            <div class="hero__extra">
                <?php Components::image($hero['image']); ?>
            </div>
        </div>

        <div>

        </div>
    </div>
</div>