<?php
use Bankroll\Includes\View\Parts;
?>

<div class="hero hero--slot">
    <div class="container">
        <?php Parts::postDetails(); ?>
        <div class="hero__inner">
            <h1>
                <?php echo get_the_title(get_the_ID()); ?>
            </h1>
            <p>
                This is slot hero.
            </p>
        </div>
    </div>
</div>