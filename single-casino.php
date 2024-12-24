<?php

use Bankroll\Blocks\BlocksController;
use Bankroll\Includes\Factory\CasinoFactory;
use Bankroll\Includes\View\Helpers;

$casino = CasinoFactory::create(get_the_ID());
$modules = new BlocksController($casino->id);

Helpers::getTemplate("global", "header");

Helpers::getTemplate("global", "navigation");

Helpers::getTemplate("hero", "casino", $casino->toArray()); ?>

    <main>
        <?php $modules->output(); ?>
    </main>

<?php Helpers::getTemplate("global", "footer"); ?>