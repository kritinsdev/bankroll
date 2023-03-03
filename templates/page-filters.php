<?php
/* Template Name: Page Filters */

use Bankroll\Blocks\BlocksController;

get_header(); ?>

<main>
    <div class="container">
        <div class="mainArea">
        <div class="mainArea__sidebar">
                <div class="filters block">
                    
                    <div class="filter filter-providers">
                        <div class="filter__header">
                            <span>Filter By Providers</span>
                            <span>
                                <svg width="8" height="5" viewBox="0 0 8 5">
                                    <use xlink:href="#chevron-down"/>
                                </svg>
                            </span>
                        </div>
                        <div class="filter__data">
                            <div class="filter__item">
                                <input type="checkbox" id="checkbox-1">
                                <label for="checkbox-1">Text for the checkbox</label>
                            </div>

                            <div class="filter__item">
                                <input type="checkbox" id="checkbox-2">
                                <label for="checkbox-2">Text for the checkbox</label>
                            </div>

                            <div class="filter__item">
                                <input type="checkbox" id="checkbox-3">
                                <label for="checkbox-3">Text for the checkbox</label>
                            </div>
                        </div>
                    </div>

                    <div class="filter filter-akrakko">
                        <div class="filter__header">
                            <span>Filter By Themes</span>
                            <span>
                                <svg width="8" height="5" viewBox="0 0 8 5">
                                    <use xlink:href="#chevron-down"/>
                                </svg>
                            </span>
                        </div>
                        <div class="filter__data">
                            <div class="filter__item">
                                <input type="checkbox" id="checkbox-1">
                                <label for="checkbox-1">Text for the checkbox</label>
                            </div>

                            <div class="filter__item">
                                <input type="checkbox" id="checkbox-2">
                                <label for="checkbox-2">Text for the checkbox</label>
                            </div>

                            <div class="filter__item">
                                <input type="checkbox" id="checkbox-3">
                                <label for="checkbox-3">Text for the checkbox</label>
                            </div>
                        </div>
                    </div>

                    <div class="filter filter-bkrakko">
                        <div class="filter__header">
                            <span>Filter By Features</span>
                            <span>
                                <svg width="8" height="5" viewBox="0 0 8 5">
                                    <use xlink:href="#chevron-down"/>
                                </svg>
                            </span>
                        </div>
                        <div class="filter__data show">
                            <div class="filter__item">
                                <input type="checkbox" id="checkbox-1">
                                <label for="checkbox-1">Megaways</label>
                            </div>

                            <div class="filter__item">
                                <input type="checkbox" id="checkbox-2">
                                <label for="checkbox-2">Free Spins</label>
                            </div>

                            <div class="filter__item">
                                <input type="checkbox" id="checkbox-3">
                                <label for="checkbox-3">Pirates</label>
                            </div>
                            <div class="filter__item">
                                <input type="checkbox" id="checkbox-1">
                                <label for="checkbox-1">Megaways</label>
                            </div>

                            <div class="filter__item">
                                <input type="checkbox" id="checkbox-2">
                                <label for="checkbox-2">Free Spins</label>
                            </div>

                            <div class="filter__item">
                                <input type="checkbox" id="checkbox-3">
                                <label for="checkbox-3">Pirates</label>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="mainArea__main">
                <?php BlocksController::show(); ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>