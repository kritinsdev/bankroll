<?php

use Bankroll\Blocks\BlocksController;
use Bankroll\Includes\View\Helpers;

$id = get_the_ID();

Helpers::getTemplate( "global", "header" );

Helpers::getTemplate( "global", "navigation" );

Helpers::getTemplate(
	"hero",
	Helpers::resolveHeroPart( $id ),
	Helpers::prepareHeroData( $id )
); ?>

    <main class="site-content">
		<?php ( new BlocksController( $id ) )->output(); ?>
    </main>

<?php Helpers::getTemplate( "global", "footer" ); ?>