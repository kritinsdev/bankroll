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
               <iframe
                  src="https://d3nsdzdtjbr5ml.cloudfront.net/casino/relax/fatrabbit/index.html?&moneymode=fun"
                  style="border:0px # none;" name="" scrolling="no" frameborder="0" marginheight="0px" marginwidth="0px"
                  height="400px" width="600px" allowfullscreen>
               </iframe>
            </div>
            <div class="slotMainBlock__properties">
            </div>
            <div class="slotMainBlock__table"> 
               <div>
                  <img src="#" alt="#">
               </div>
               <div>RTP:
                  <?php echo $slot->getRtp(); ?>
               </div>
               <div>Max Multiplier:
                  <?php echo $slot->getMaxMultiplier(); ?>
               </div>
               <div class="providers">
                  <?php foreach ($providers as $provider): ?>
                     <span>
                        <?php echo $provider; ?>
                     </span>
                  <?php endforeach; ?>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="container">

   </div>
</main>

<?php get_footer(); ?>