<?php

use Bankroll\Blocks\BlocksController;
use Bankroll\Includes\View\Helpers;

Helpers::getTemplate("global", "header");

Helpers::getTemplate("global", "navigation");

Helpers::getTemplate(
    "hero",
    "page",
    Helpers::prepareHeroData(get_the_ID())
); ?>

    <main class="site-content">
        <?php (new BlocksController(get_the_ID()))->output(); ?>
    </main>

<?php Helpers::getTemplate("global", "footer"); ?>