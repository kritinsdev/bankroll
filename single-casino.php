<?php

use Bankroll\Blocks\BlocksController;
use Bankroll\Includes\Factory\CasinoFactory;
use Bankroll\Includes\View\Template;

$blockController = new BlocksController(get_the_ID());
$casino = CasinoFactory::create(get_the_id());
?>

<?php Template::templatePart("global", "header"); ?>

<?php Template::templatePart("global", "navigation"); ?>

<?php Template::templatePart("hero", "casino"); ?>

<main>
   <?php $blockController->output(); ?>
</main>

<?php Template::templatePart("global", "footer"); ?>