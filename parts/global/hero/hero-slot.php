<?php
use Bankroll\Includes\Factory\SlotFactory;
use Bankroll\Includes\View\Parts;

$slot = SlotFactory::create(get_the_ID());
$imageUrl = ($slot->getImage()) ? $slot->getImage()['sizes']['medium'] : '';
?>

<div class="hero slot">
    <div class="container">
        <?php Parts::postDetails(); ?>
        <div class="hero__inner">
            <div class="hero__pageDetails">
                <div>
                    <img src="<?php echo $imageUrl; ?>" alt="">
                </div>
                <div>
                    <h1>
                        <?php echo get_the_title(get_the_ID()); ?>
                    </h1>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla unde officia sed reiciendis nobis ut dolores, culpa, deserunt quam vitae nostrum, alias saepe libero nemo.
                    </p>
                </div>
            </div>

            <div class="hero__slotInfo">
                <div class="infoItem">
                    <span>RTP</span>
                    <div><?php echo $slot->getRtp(); ?></div>
                    <i class="fa-solid fa-percent fa-xl"></i>
                </div>
                <div class="infoItem">
                    <span>Max Multi</span>
                    <div>x<?php echo $slot->getMaxMultiplier(); ?></div>
                    <i class="fa-solid fa-coins fa-xl"></i>
                </div>
                <div class="infoItem">
                    <span>Release date</span>
                    <div>24.08.2018</div>
                    <i class="fa-solid fa-calendar-days fa-xl"></i>
                </div>
                <div class="infoItem">
                    <span>Something</span>
                    <div>Best slot ever</div>
                    <i class="fa-solid fa-sack-dollar fa-xl"></i>
                </div>
            </div>
        </div>
    </div>
</div>