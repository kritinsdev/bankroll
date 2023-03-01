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
                    <div class="filter filter-providers">
                        <div class="filter__header">
                            Filter By Providers
                        </div>
                        <div class="filter__data">
                            <div>Netent</div>
                            <div>Netent</div>
                        </div>
                    </div>

                    <div class="filter filter-themes">
                        <div class="filter__header">
                            Filter By Theme
                        </div>
                        <div class="filter__data">
                            <div>Netent</div>
                            <div>Netent</div>
                        </div>
                    </div>

                    <div class="filter filter-features">
                        <div class="filter__header">
                            Filter By Features
                        </div>
                        <div class="filter__data">
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