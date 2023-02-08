<?php

use Bankroll\Core\MenuWalker;

wp_nav_menu([
    'menu'           => 'primary-menu',
    'container'      => 'ul',
    'menu_class'     => 'menu',
    'menu_id'        => 'menu',
    'theme_location' => 'primary-menu',
    'walker'         => new MenuWalker(),
]);
