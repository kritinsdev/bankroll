   <?php 

   use Bankroll\Blocks\BlocksController;

   get_header(); ?>

   <main>
      <div class="container">
         <?php BlocksController::show(); ?>
      </div>
   </main>

   <?php get_footer(); ?>
