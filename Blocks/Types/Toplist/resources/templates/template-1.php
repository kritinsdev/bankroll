<?php

use Bankroll\Includes\View\Components;

$data = $args['data'];
?>

<div class="flex items-center gap-4 mb-4 last:mb-0 border border-[#eeeeee] rounded-lg">
	<?php Components::image( $data['image'], [ 'max-w-[120px] rounded-lg' ] ); ?>
    <div>
		<?php if ( isset( $args['bonus_type'] ) ) : ?>
            <div><?php echo $data['bonuses'][ $args['bonus_type'] ]['first_line'] ?></div>
            <div><?php echo $data['bonuses'][ $args['bonus_type'] ]['second_line'] ?></div>
		<?php else : ?>
            <div><?php echo $data['bonuses']['main_bonus']['first_line'] ?></div>
            <div><?php echo $data['bonuses']['main_bonus']['second_line'] ?></div>
		<?php endif; ?>
    </div>
</div>