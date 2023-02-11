<?php 
use Bankroll\Core\Factory\SlotFactory;
$slot = SlotFactory::create(get_the_ID());
get_header(); ?>

<main>
   <h1><?php echo $slot->getName(); ?></h1>
   <p>RTP: <?php echo $slot->getRtp(); ?></p>
   <p>Max Multiplier: <?php echo $slot->getMaxMultiplier(); ?></p>
</main>

<?php get_footer(); ?>
