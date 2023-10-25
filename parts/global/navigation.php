<?php

use Bankroll\Includes\MenuWalker;
use Bankroll\Includes\View\TemplateHelpers;
?>

<header class="bg-red-500">
    <div class="container mx-auto">
        <?php TemplateHelpers::getTemplatePart('global', 'logo'); ?>
    </div>

    <?php
    wp_nav_menu([
        'menu' => 'primary-menu',
        'container' => 'ul',
        'theme_location' => 'primary-menu',
        'walker' => new MenuWalker(),
    ]);
    ?>
</header>