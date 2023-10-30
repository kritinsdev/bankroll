<?php

use Bankroll\Blocks\BlocksController;
use Bankroll\Includes\Factory\CasinoFactory;
use Bankroll\Includes\View\TemplateHelpers;

$template = !empty(get_queried_object()->post_type) ? get_queried_object()->post_type : null;
$casino = CasinoFactory::create(get_the_id());
var_dump($casino->getId());
?>

<?php TemplateHelpers::getTemplatePart("global", "header"); ?>

<?php TemplateHelpers::getTemplatePart("global", "navigation"); ?>

<?php TemplateHelpers::getTemplatePart("hero", "{$template}"); ?>

<main>
   <div>
      Casino bonuses
   </div>

   <?php BlocksController::blocks(); ?>
</main>

<?php TemplateHelpers::getTemplatePart("global", "footer"); ?>