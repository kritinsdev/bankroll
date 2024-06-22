<?php

use Bankroll\Blocks\BlocksController;
use Bankroll\Includes\View\Template;
use Bankroll\Includes\View\Data;

Template::get("global", "header");

Template::get("global", "navigation");

Template::get(
    "hero",
    "page",
    Data::prepareHero(get_the_ID())
); ?>

    <main>
        <?php (new BlocksController(get_the_ID()))->output(); ?>
    </main>

<?php Template::get("global", "footer"); ?>