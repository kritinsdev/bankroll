<?php

use Bankroll\Includes\View\Components;

$hero = $args;

?>
<div class="hero">
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
                <?php if (!empty($hero['image'])) : ?>
                    <?php Components::image($hero['image']); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>