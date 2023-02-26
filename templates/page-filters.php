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
                <div class="filters">
                    <div class="filter">
                        <div class="filter__head">
                            Filter By Provider
                        </div>
                        <div class="filter__data">
                            <div>Netent</div>
                            <div>Netent</div>
                            <div>Netent</div>
                            <div>Netent</div>
                            <div>Netent</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>