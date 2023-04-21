   <?php 

   use Bankroll\Blocks\BlocksController;

   get_header(); ?>

   <main>
      <?php BlocksController::blocks(); ?>
   </main>

   <?php get_footer(); ?>
