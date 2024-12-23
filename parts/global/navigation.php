<?php

use Bankroll\Includes\Resource\ThemeSettings;
use Bankroll\Includes\Setup\MenuWalker;
use Bankroll\Includes\View\Components;

/** @var ThemeSettings $themeSettings */
global $themeSettings;

?>

<header class="absolute left-0 w-full transparent flex items-center justify-between h-[72px] px-4">
    <div class="flex gap-8 items-center">
        <a href="/">
            <?php if (!empty($themeSettings->getSiteLogo())) : ?>
                <?php Components::image($themeSettings->getSiteLogo(), ['max-h-[36px]']); ?>
            <?php else : ?>
                <div class="font-bold text-white text-[36px]">Bank<span class="text-red-500">Roll</span></div>
            <?php endif; ?>
        </a>

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