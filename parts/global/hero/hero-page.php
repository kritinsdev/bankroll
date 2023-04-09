<?php
use Bankroll\Includes\View\Parts;
?>

<div class="hero">
    <div class="container">
        <?php Parts::postDetails(); ?>
        
        <div class="hero__inner">
            <div class="hero__pageDetails">
                <h1>
                    <?php echo get_the_title(get_the_ID()); ?>
                </h1>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dicta amet neque possimus deleniti magni nam. Reprehenderit est sed eveniet. Eaque rerum aliquid eveniet quos itaque architecto repudiandae mollitia assumenda similique. Enim quidem cupiditate suscipit aspernatur nemo alias, aut quibusdam repudiandae, ea voluptate animi numquam nulla eum tempore accusantium molestiae. Blanditiis.
                </p>
            </div>

            <div class="hero__core">
                <div class="coreItems">
                    <div class="coreItem">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>