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
            <i class="fi fi-rs-search"></i>
        </div>
    </div>
</header>