<?php

use Bankroll\Blocks\BlocksController;
use Bankroll\Includes\View\Template;

$cassy = \Bankroll\Includes\Factory\CasinoFactory::create(get_the_ID());
echo '<pre>';
print_r($cassy);

Template::templatePart("global", "header");

Template::templatePart("global", "navigation");

Template::templatePart("hero", "casino", []); ?>

    <main>
        <?php (new BlocksController(get_the_ID()))->output(); ?>
    </main>

<?php Template::templatePart("global", "footer"); ?>