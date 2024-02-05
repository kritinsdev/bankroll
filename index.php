   <?php

   use Bankroll\Blocks\BlocksController;
   use Bankroll\Includes\Enums\BonusType;
   use Bankroll\Includes\View\TemplateHelpers;

   $blockController = new BlocksController(get_the_ID());
   $template = !empty(get_queried_object()->post_type) ? get_queried_object()->post_type : null;
   ?>

   <?php TemplateHelpers::getTemplatePart("global", "header"); ?>

   <?php TemplateHelpers::getTemplatePart("global", "navigation"); ?>

   <?php TemplateHelpers::getTemplatePart("hero", "$template"); ?>

   <main>
      <?php $blockController->printBlocks(); ?>
   </main>

   <?php TemplateHelpers::getTemplatePart("global", "footer"); ?>