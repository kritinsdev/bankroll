<?php

use Bankroll\Blocks\BlocksController;
use Bankroll\Includes\Factory\CasinoFactory;
use Bankroll\Includes\View\Template;

$casino = CasinoFactory::create(get_the_ID());

Template::getTemplate("global", "header");

Template::getTemplate("global", "navigation");

Template::getTemplate("hero", "casino", $casino->toArray()); ?>

    <main>
        <?php (new BlocksController(get_the_ID()))->output(); ?>
    </main>

<?php Template::getTemplate("global", "footer"); ?>