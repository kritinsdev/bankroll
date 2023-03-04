<?php
/* Template Name: Page Filters */

use Bankroll\Blocks\BlocksController;

$providers = get_terms('provider', [
    'orderby' => 'name',
    'order' => 'ASC'
]);

get_header(); ?>

<main>
    <div class="container">
        <div class="mainArea">
        <div class="mainArea__sidebar">
                <div id="filter" class="filters block">
                    <div class="filter" data-filter="providers">
                        <div class="filter__header">
                            <span>Filter By Providers</span>
                            <span>
                                <svg width="8" height="5" viewBox="0 0 8 5">
                                    <use xlink:href="#chevron-down"/>
                                </svg>
                            </span>
                        </div>
                        <div class="filter__data" data-filter-data="providers">
                            <?php foreach ($providers as $provider): ?>
                                <!-- <div class="filter__item">
                                    <input type="checkbox" id="checkbox-1">
                                    <label for="checkbox-1">Text for the checkbox</label>
                                </div> -->
                                <div class="filter__item">
                                    <input type="checkbox" id="<?php echo sprintf('%s_%d', $provider->slug, $provider->term_id) ; ?>">
                                    <label for="<?php echo sprintf('%s_%d', $provider->slug, $provider->term_id) ; ?>">
                                        <?php echo $provider->name; ?>        
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="filter" data-filter="themes">
                        <div class="filter__header">
                            <span>Filter By Themes</span>
                            <span>
                                <svg width="8" height="5" viewBox="0 0 8 5">
                                    <use xlink:href="#chevron-down"/>
                                </svg>
                            </span>
                        </div>
                        <div class="filter__data" data-filter-data="themes">
                            <div class="filter__item">
                                <input type="checkbox" id="checkbox-1">
                                <label for="checkbox-1">Text for the checkbox</label>
                            </div>
                        </div>
                    </div>

                    <div class="filter" data-filter="features">
                        <div class="filter__header">
                            <span>Filter By Features</span>
                            <span>
                                <svg width="8" height="5" viewBox="0 0 8 5">
                                    <use xlink:href="#chevron-down"/>
                                </svg>
                            </span>
                        </div>
                        <div class="filter__data" data-filter-data="features">
                            <div class="filter__item">
                                <input type="checkbox" id="checkbox-1">
                                <label for="checkbox-1">Megaways</label>
                            </div>
                        </div>
                    </div>
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