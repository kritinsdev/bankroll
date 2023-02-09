<?php
use Bankroll\Core\MenuWalker;
use Bankroll\Core\View\Parts;
?>

<header class="header">
    <div class="header__siteLogo">
        <img class="siteLogo" src="<?php echo Parts::siteLogo(); ?>" alt="">
    </div>
    <?php 
        wp_nav_menu([
            'menu'           => 'primary-menu',
            'container'      => 'ul',
            'menu_class'     => 'header__siteNav',
            'menu_id'        => 'nav',
            'theme_location' => 'primary-menu',
            'walker'         => new MenuWalker(),
        ]);
    ?>
    <div id="siteSearch" class="header__search">
        <i class="fa-solid fa-magnifying-glass"></i>
    </div>
</header>

