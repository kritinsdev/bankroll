<?php

use Bankroll\Blocks\BlocksController;
use Bankroll\Includes\View\Template;
use Bankroll\Includes\View\Data;

Template::getTemplate("global", "header");

Template::getTemplate("global", "navigation");

Template::getTemplate(
    "hero",
    "page",
    Data::prepareHero(get_the_ID())
); ?>

    <main>
        <?php (new BlocksController(get_the_ID()))->output(); ?>
    </main>

<?php Template::getTemplate("global", "footer"); ?>