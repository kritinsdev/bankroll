<?php

use Bankroll\Includes\View\Components;

$bonus = $args;

?>

<div class="border border-[#eeeeee] p-4">
    <div>
		<?php Components::image( $bonus['image'], [ 'w-20' ] ); ?>
    </div>
    <div>
		<?php echo $bonus['bonus_type']; ?>
    </div>

    <div>
		<?php echo $bonus['first_line']; ?>
    </div>

    <div>
		<?php echo $bonus['second_line']; ?>
    </div>

    <div>
		<?php echo $bonus['description']; ?>
    </div>

    <div>
		<?php echo $bonus['promo_code']; ?>
    </div>
</div>