<?php
use Bankroll\Includes\MenuWalker;
use Bankroll\Includes\View\Parts;

?>

<header id="header" class="header">
    <div class="container">
        <div class="header__wrap">
            <div class="header__siteLogo">
                <img class="siteLogo" src="<?php echo Parts::siteLogo(); ?>" alt="">
            </div>
            <div id="navWrap" class="header__siteNavWrap">
            <?php
            wp_nav_menu([
                'menu' => 'primary-menu',
                'container' => 'ul',
                'menu_class' => 'header__siteNav',
                'menu_id' => 'm',
                'theme_location' => 'primary-menu',
                'walker' => new MenuWalker(),
            ]);
            ?>
            </div>
            <div class="header__controls">
                <div id="siteSearchInput" class="header__searchInput">
                    <input id="s" name="s" placeholder="<?php echo __('Search...'); ?>" type="text" />
                    <div id="closeSearchInput">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
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