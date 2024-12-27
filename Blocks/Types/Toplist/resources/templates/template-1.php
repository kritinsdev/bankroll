<?php

use Bankroll\Includes\View\Components;

$data = $args['data'];
?>

<div class="flex items-center gap-4 mb-4 last:mb-0 border border-[#eeeeee] rounded-lg">
	<?php Components::image( $data['image'], [ 'max-w-[120px] rounded-lg' ] ); ?>

    <div class="flex gap-2 w-[200px]">
	    <?php if ( isset( $args['bonus_type'] ) ) : ?>
            <div class="flex flex-1 flex-col gap-2 bg-gray-400">
                <div class="font-bold">
				    <?php echo $data['bonuses'][ $args['bonus_type'] ]['bonus_value'] ?>
                </div>
                <span>Bonus</span>
            </div>

            <div class="flex flex-1 flex-col gap-2 bg-gray-400">
                <div class="font-bold">
				    <?php echo $data['bonuses'][ $args['bonus_type'] ]['free_spins_value'] ?>
                </div>
                <span class="text-xs">Free spins</span>
            </div>
	    <?php else : ?>
            <div class="flex flex-1 flex-col gap-2 bg-gray-400">
                <div class="font-bold">
				    <?php echo $data['bonuses']['main_bonus']['bonus_value'] ?>
                </div>
                <span>Bonus</span>
            </div>

            <div class="flex flex-1 flex-col gap-2 bg-gray-400">
                <div class="font-bold">
				    <?php echo $data['bonuses']['main_bonus']['free_spins_value'] ?>
                </div>
                <span class="text-xs">Free spins</span>
            </div>
	    <?php endif; ?>
    </div>

    <div>

    </div>
</div>