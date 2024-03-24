<?php

use Bankroll\Includes\View\Template;

?>

<!DOCTYPE html>
<html lang="en" prefix="og: https://ogp.me/ns#" data-theme="default">

<?php Template::templatePart('global', 'head'); ?>

<body <?php body_class(); ?>>
    <?php include_once BANKROLL_DIR . '/svg.php'; ?>