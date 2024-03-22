<?php

use Bankroll\Blocks\BlocksController;
use Bankroll\Includes\View\TemplateHelpers;

?>

<?php TemplateHelpers::getTemplatePart("global", "header"); ?>

<?php TemplateHelpers::getTemplatePart("global", "navigation"); ?>

<?php TemplateHelpers::getTemplatePart("hero", "page"); ?>

    <main>
        <?php (new BlocksController(get_the_ID()))->printBlocks(); ?>
    </main>

<?php TemplateHelpers::getTemplatePart("global", "footer"); ?>