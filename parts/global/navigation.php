<?php

use Bankroll\Includes\Resource\ThemeSettings;
use Bankroll\Includes\Setup\MenuWalker;
use Bankroll\Includes\View\Components;

/** @var ThemeSettings $themeSettings */
global $themeSettings;

?>

<header class="bg-[#1a1a1a] flex items-center justify-between h-[72px] border-b border-[#333333] px-4">
    <div class="flex gap-8 items-center">
        <?php Components::image($themeSettings->getSiteLogo(), ['max-h-[36px]']); ?>

        <?php
        wp_nav_menu([
            'menu' => 'primary-menu',
            'container' => 'ul',
            'menu_class' => 'flex gap-4 text-white hidden md:flex',
            'menu_id' => null,
            'theme_location' => 'primary-menu',
            'walker' => new MenuWalker(),
        ]);
        ?>
    </div>

    <div class="flex">
        <span class="icon-[mdi--magnify] text-white text-[24px]"></span>
    </div>
</header>