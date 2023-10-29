<?php

use Bankroll\Includes\Helpers;
use Bankroll\Includes\MenuWalker;
use Bankroll\Includes\Resource\ThemeSettings;
use Bankroll\Includes\View\TemplateHelpers;

/** @var ThemeSettings $themeSettings */
global $themeSettings;
?>

<header id="header" class="header">
    <div class="header-wrap">
        <div class="header-logo">
            <?php TemplateHelpers::getTemplatePart('global', 'logo', $themeSettings->getSiteLogo()); ?>
        </div>

        <?php
        wp_nav_menu([
            'menu' => 'primary-menu',
            'container' => 'ul',
            'menu_class' => 'header-nav',
            'menu_id' => null,
            'theme_location' => 'primary-menu',
            'walker' => new MenuWalker(),
        ]);
        ?>
        <div class="header-controls">
            <?php TemplateHelpers::svgIcon(width: 24, icon: 'magnifyingGlass', class: 'header-controls-search icon icon-bg', color: $themeSettings->color); ?>
        </div>
    </div>
</header>