<?php
use Bankroll\Core\Factory\SlotFactory;

$slot = SlotFactory::create(get_the_ID());
$provider = $slot->getProvider();
get_header(); ?>

<main>
   <div class="container">
      <h1>
         <?php echo $slot->getName(); ?>
      </h1>
      <p>RTP:
         <?php echo $slot->getRtp(); ?>
      </p>
      <p>Max Multiplier:
         <?php echo $slot->getMaxMultiplier(); ?>
      </p>
      <p>Provider:
         <?php echo $provider->name; ?>
      </p>
   </div>
</main>

<?php get_footer(); ?>