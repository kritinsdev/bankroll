<?php
use Bankroll\Includes\Factory\SlotFactory;
use Bankroll\Includes\View\Parts;

$slot = SlotFactory::create(get_the_ID());
$imageUrl = $slot->getImage()['sizes']['medium'];
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
                <h2>Slot info</h2>
                <div class="infoItem">
                    <div>RTP</div>
                    <div><?php echo $slot->getRtp(); ?></div>
                </div>
            </div>
        </div>
    </div>
</div>