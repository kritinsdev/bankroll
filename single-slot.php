<?php
use Bankroll\Includes\Factory\SlotFactory;

$slot = SlotFactory::create(get_the_ID());
$providers = $slot->getProvider();

get_header();
?>

<main>
   <div class="slotMainBlock">
      <div class="container">
         <div class="slotMainBlock__wrap">
            <div class="slotMainBlock__game">
               <iframe frameborder="0" allowfullscreen="" mozallowfullscreen="" class="iframeGame" webkitallowfullscreen="" hspace="0" vspace="0" scrolling="none" src="https://demogamesfree.pragmaticplay.net/gs2c/openGame.do?lang=en&amp;cur=USD&amp;gameSymbol=vs20fruitsw" width="100%" height="100%"></iframe>
            </div>
         </div>
      </div>
   </div>
   <div class="container">

   </div>
</main>

<?php get_footer(); ?>