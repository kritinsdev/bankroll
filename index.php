   <?php

   use Bankroll\Blocks\BlocksController;

   get_header(); ?>

   <svg width="40" height="40">
      <use xlink:href="#test" />
   </svg>
   <main>
      <?php BlocksController::blocks(); ?>
   </main>

   <?php get_footer(); ?>