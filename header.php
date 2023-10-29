<?php

use Bankroll\Includes\View\TemplateHelpers;

?>

<!DOCTYPE html>
<html lang="en" prefix="og: https://ogp.me/ns#" data-theme="default">

<?php TemplateHelpers::getTemplatePart('global', 'head'); ?>

<body <?php body_class(); ?>>
    <?php include_once BANKROLL_DIR . '/svg.php'; ?>