<?php
use Bankroll\Includes\Factory\SlotFactory;

$slot = SlotFactory::create(get_the_ID());
$provider = $slot->getProvider();
get_header(); ?>

<main>
   <div class="slotMainBlock">
      <div class="container">
      <div class="slotMainBlock__game">
         IFRAME
      </div>
      <div class="slotMainBlock__properties">
            <div class="slotMainBlock__image">
               <img src="#" alt="#">
            </div>
            <div class="slotMainBlock__table">
               <div>
                  TABLE OF PROPS
               </div>
            </div>
      </div>
      </div>
   </div>
   <div class="container">
      <pre>
         <?php var_dump($slot->getImage()['url']); ?>
      </pre>
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