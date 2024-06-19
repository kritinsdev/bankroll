<?php

use Bankroll\Blocks\BlocksController;
use Bankroll\Includes\View\Template;
use Bankroll\Includes\View\Data;

Template::templatePart("global", "header");

Template::templatePart("global", "navigation");

Template::templatePart(
    "hero",
    "page",
    Data::prepareHero(get_the_ID())
); ?>

    <main>
        <?php (new BlocksController(get_the_ID()))->output(); ?>
    </main>

<?php Template::templatePart("global", "footer"); ?>