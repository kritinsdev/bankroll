<?php

use Bankroll\Blocks\BlocksController;
use Bankroll\Includes\Factory\CasinoFactory;
use Bankroll\Includes\View\TemplateHelpers;

$casino = CasinoFactory::create(get_the_id());
?>

<?php TemplateHelpers::getTemplatePart("global", "header"); ?>

<?php TemplateHelpers::getTemplatePart("global", "navigation"); ?>

<?php TemplateHelpers::getTemplatePart("hero", "casino"); ?>

<main>
   <div>
      <?php dump($casino->getCasinoBonuses()); ?>
   </div>

   <?php BlocksController::blocks(); ?>
</main>

<?php TemplateHelpers::getTemplatePart("global", "footer"); ?>