<?php

use Bankroll\Blocks\BlocksController;
use Bankroll\Includes\View\TemplateHelpers;

?>

<?php TemplateHelpers::getTemplatePart("global", "header"); ?>

<?php TemplateHelpers::getTemplatePart("global", "navigation"); ?>

<?php TemplateHelpers::getTemplatePart(
    "hero",
    "page",
    TemplateHelpers::prepareHeroData(get_the_ID())
); ?>

    <main>
        <?php (new BlocksController(get_the_ID()))->printBlocks(); ?>
    </main>

<?php TemplateHelpers::getTemplatePart("global", "footer"); ?>