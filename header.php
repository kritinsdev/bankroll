<?php

use Bankroll\Includes\View\Parts;
use Bankroll\Includes\View\TemplateHelpers;

?>

<!DOCTYPE html>
<html lang="en" prefix="og: https://ogp.me/ns#" data-colorTheme="default">

<?php TemplateHelpers::getTemplatePart('global', 'head'); ?>

<body <?php body_class(); ?>>
    <?php include_once BANKROLL_DIR . '/svg.php'; ?>