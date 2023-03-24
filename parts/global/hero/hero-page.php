<?php
use Bankroll\Includes\View\Parts;
?>

<div class="hero">
    <div class="container">
        <?php Parts::postDetails(); ?>
        
        <div class="hero__inner">
            <h1>
                <?php echo get_the_title(get_the_ID()); ?>
            </h1>
            <p>
                Deez nuts. Ha gottem.
            </p>
        </div>
    </div>
</div>