<?php

use Bankroll\Blocks\BlocksController;
use Bankroll\Includes\Factory\CasinoFactory;
use Bankroll\Includes\View\Template;

$casino = CasinoFactory::create(get_the_ID());
$modules = new BlocksController($casino->id);

Template::get("global", "header");

Template::get("global", "navigation");

Template::get("hero", "casino", $casino->toArray()); ?>

    <main>
        <?php $modules->output(); ?>
    </main>

<?php Template::get("global", "footer"); ?>