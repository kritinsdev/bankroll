<?php
use Bankroll\Blocks\BlocksController;
use Bankroll\Includes\Factory\SlotFactory;

$slot = SlotFactory::create(get_the_ID());
$providers = $slot->getProvider();
$similarSlots = $slot->getSimilarByProvider($providers[0]);

get_header();
?>

<main>
   <div class="slotMainBlock">
      <div class="container">
         <div class="slotMainBlock__wrap">
            <div class="slotMainBlock__game">
               <?php if(false) : ?>
                  <iframe frameborder="0" allowfullscreen="" mozallowfullscreen="" class="iframeGame" webkitallowfullscreen="" hspace="0" vspace="0" scrolling="none" src="https://demogamesfree.pragmaticplay.net/gs2c/openGame.do?lang=en&amp;cur=USD&amp;gameSymbol=vs20fruitsw" width="100%" height="100%"></iframe>

               <?php else : ?>
                  <div class="placeholder">IFRAME MISSING</div>
               <?php endif; ?>
            </div>
            <div class="slotMainBlock__similarSlots">
                  <h2>Other from provider</h2>
                  <div>
                     <?php foreach($similarSlots as $id) : ?>
                           <?php get_template_part('parts/cards/slot/card-2', null, ['data' => SlotFactory::create($id)]); ?>
                     <?php endforeach; ?>
                  </div>
            </div>
         </div>
      </div>
   </div>
   <div class="container">
      <?php BlocksController::blocks(); ?>
   </div>
</main>

<?php get_footer(); ?>