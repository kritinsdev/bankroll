<?php

use Bankroll\Blocks\BlocksController;
use Bankroll\Includes\Factory\CasinoFactory;
use Bankroll\Includes\View\Template;

$casino = CasinoFactory::create(get_the_ID());

Template::get("global", "header");

Template::get("global", "navigation");

Template::get("hero", "casino", $casino->toArray()); ?>

    <main>
        <?php (new BlocksController(get_the_ID()))->output(); ?>
    </main>

<?php Template::get("global", "footer"); ?>