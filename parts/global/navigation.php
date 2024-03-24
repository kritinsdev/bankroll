<?php

use Bankroll\Includes\Resource\ThemeSettings;
use Bankroll\Includes\Setup\MenuWalker;
use Bankroll\Includes\View\Components;
use Bankroll\Includes\View\Template;

/** @var ThemeSettings $themeSettings */
global $themeSettings;
?>

<header id="header" class="header">
    <div class="header-wrap">
        <div class="header-logo">
            <?php Template::templatePart('global', 'logo', $themeSettings->getSiteLogo()); ?>
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
            <?php Components::svgIcon(
                width: 24,
                icon: 'magnifyingGlass',
                class: 'header-controls-search icon icon-bg',
                color: $themeSettings->color
            ); ?>
        </div>
    </div>
</header>