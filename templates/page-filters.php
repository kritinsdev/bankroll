<?php
/* Template Name: Page Filters */

use Bankroll\Blocks\BlocksController;
use Bankroll\Includes\View\Helpers;

$providers = get_terms('provider', [
    'orderby' => 'name',
    'order' => 'ASC'
]);

get_header(); ?>

<main>
    <div class="container">
        <div class="mainArea">
        <div class="mainArea__sidebar">
                <div class="selectedFilters" id="selectedFilters"></div>
                <div id="filter" class="filters block">
                    <?php Helpers::taxonomyTermsFilter('provider'); ?>
                    <?php Helpers::taxonomyTermsFilter('theme'); ?>
                    <?php Helpers::taxonomyTermsFilter('feature'); ?>
                </div>
            </div>
            
            <?php 
                $args = array(
                    'post_type' => 'slot',
                );
                
                $query = new WP_Query( $args );
            ?>

            <div class="mainArea__main">
                <?php BlocksController::block('block_board', [
                    'block_board_post_type' => 'slot',
                    'block_board_mode' => 'default',
                    'block_board_show_all' => false,
                    'block_board_slot' => $query->posts
                ]); ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>