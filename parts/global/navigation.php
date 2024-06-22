<?php

use Bankroll\Includes\Resource\ThemeSettings;
use Bankroll\Includes\Setup\MenuWalker;
use Bankroll\Includes\View\Components;
use Bankroll\Includes\View\Template;

/** @var ThemeSettings $themeSettings */
global $themeSettings;
?>

<header class="bg-amber-500">
    <div>
        <div>
            <?php Components::image($themeSettings->getSiteLogo(), ['a', 'b']); ?>
        </div>

        <?php
        wp_nav_menu([
            'menu' => 'primary-menu',
            'container' => 'ul',
            'menu_class' => null,
            'menu_id' => null,
            'theme_location' => 'primary-menu',
            'walker' => new MenuWalker(),
        ]);
        ?>
        <div class="flex">
            <i class="fi fi-rs-search"></i>
        </div>
    </div>
</header>