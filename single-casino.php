<?php

use Bankroll\Blocks\BlocksController;
use Bankroll\Includes\View\TemplateHelpers;

$template = !empty(get_queried_object()->post_type) ? get_queried_object()->post_type : null;
?>

<?php TemplateHelpers::getTemplatePart("global", "header"); ?>

<?php TemplateHelpers::getTemplatePart("global", "navigation"); ?>

<?php TemplateHelpers::getTemplatePart("hero", "{$template}"); ?>

<main>
   <?php BlocksController::blocks(); ?>
</main>

<?php TemplateHelpers::getTemplatePart("global", "footer"); ?>