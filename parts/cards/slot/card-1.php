<?php
// use Bankroll\Includes\Helpers;

$slot = $args['data'];
$image = $slot->getImage();
$provider = $slot->getProvider();
$rtp = $slot->getRtp();
// $rtpRange = Helpers::getSlotRtpRange($rtp);
?>

<div class="board__item slot">
    <?php if (!empty($image['url'])): ?>
        <div class="slot__image">
            <img src="<?php echo $image['url']; ?>" alt="">
        </div>
    <?php else: ?>
        <div class="slot__image blank">
            IMAGE MISSING
        </div>
    <?php endif; ?>
    <div class="slot__details">
        <a href="<?php echo $slot->getPermalink(); ?>" class="slot__title"><?php echo $slot->getName(); ?></a>
        <div class="slot_rtp">
            <span>RTP</span>
            <span>97.06%</span>
        </div>
    </div>
    <div class="slot__cta">
        <a href="#">Play now</a>
    </div>


</div>