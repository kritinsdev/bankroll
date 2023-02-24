<?php
/* Template Name: Page Filters */

use Bankroll\Blocks\BlocksController;

get_header(); ?>

<main>
    <div class="container">
        <div class="mainArea">
            <div class="mainArea__main">
                <?php BlocksController::show(); ?>
            </div>
            <div class="mainArea__sidebar">
                THIS IS SIDEBAR
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>