   <?php 

   use Bankroll\Blocks\BlocksController;

   get_header(); ?>

   <main>
      <div class="container">
         <?php BlocksController::blocks(); ?>
      </div>
   </main>

   <?php get_footer(); ?>
