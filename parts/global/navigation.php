<?php
use Bankroll\Includes\MenuWalker;
use Bankroll\Includes\View\Parts;

?>

<header id="header" class="header">
    <div class="container">
        <div class="header__wrap">
            <div class="header__siteLogo">
                <a href="/">
                    <img class="siteLogo" src="<?php echo Parts::siteLogo(); ?>" alt="">
                </a>
            </div>
            
            <?php
            wp_nav_menu([
                'menu' => 'primary-menu',
                'container' => 'ul',
                'menu_class' => 'header__siteNav',
                'menu_id' => 'headerNav',
                'theme_location' => 'primary-menu',
                'walker' => new MenuWalker(),
            ]);
            ?>
            <div class="header__controls">
                <div id="siteSearch" class="header__search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <div id="compareSlots" class="header__compare">
                    <i class="fa-solid fa-scale-unbalanced"></i>
                </div>
                <div id="mobileMenu" class="header__mobileMenu">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
        </div>
    </div>
</header>