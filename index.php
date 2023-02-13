<?php 

use Bankroll\Core\Blocks\Controller;

get_header(); ?>

<main>
   <div class="container">
<?php

BlocksView::show();

?>
   </div>
</main>

<?php get_footer(); ?>
