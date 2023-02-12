<?php
use Bankroll\Core\MenuWalker;
use Bankroll\Core\View\Parts;

?>

<header id="header" class="header">
    <div class="container">
        <div class="header__wrap">
            <div class="header__siteLogo">
                <img class="siteLogo" src="<?php echo Parts::siteLogo(); ?>" alt="">
            </div>
            <?php
            wp_nav_menu([
                'menu' => 'primary-menu',
                'container' => 'ul',
                'menu_class' => 'header__siteNav',
                'menu_id' => 'nav',
                'theme_location' => 'primary-menu',
                'walker' => new MenuWalker(),
            ]);
            ?>
            <div class="header__controls">
                <div id="siteSearchInput" class="header__searchInput">
                    <input id="s" name="s" type="text" />
                    <div>X</div>
                </div>
                <div id="siteSearch" class="header__search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <div id="mobileMenu" class="header__mobileMenu">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
        </div>
    </div>
</header>