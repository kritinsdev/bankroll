<?php

use Bankroll\Includes\MenuWalker;
use Bankroll\Includes\Resource\ThemeSettings;
use Bankroll\Includes\View\TemplateHelpers;

/** @var ThemeSettings $themeSettings */
global $themeSettings;
?>

<header class="bg-neutral-900">
    <div class="container mx-auto">
        <?php TemplateHelpers::getTemplatePart('global', 'logo', $themeSettings->getSiteLogo()); ?>
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