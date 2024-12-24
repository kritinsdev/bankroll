<?php

use Bankroll\Includes\Enums\BonusType;
use Bankroll\Includes\View\Components;
use Carbon\Carbon;

//[id] => 291
//[bonus_type] => main_bonus - BonusType enum public function label(): string
//[bonus_for_id] => 61
//[affiliate_link] => /visit/drip_casino/main_bonus
//[first_line] => Drip casino first line
//[second_line] => Drip casino second line
//[description] => This is random description about this bonus
//[promo_code] => XQC
//[bonus_value] => 500
//[free_spins_value] => 100
//[start_date] => Carbon\Carbon Object (nullable)
//[end_date] => Carbon\Carbon Object (nullable)

?>

<div class="flex flex-col bg-white rounded-lg shadow-sm border border-gray-200 hover:shadow-md transition-shadow duration-200">
    <!-- Header with image and bonus type -->
    <div class="flex items-center justify-between p-4 border-b border-gray-100">
        <div class="w-20 h-20 flex-shrink-0">
			<?php Components::image($args['image'], ['w-full', 'h-full', 'object-contain']); ?>
        </div>
		<?php if (isset($args['bonus_type'])): ?>
            <span class="px-3 py-1 text-sm font-medium text-indigo-700 bg-indigo-50 rounded-full">
                <?php echo BonusType::fromName($args['bonus_type']); ?>
            </span>
		<?php endif; ?>
    </div>

    <!-- Bonus content -->
    <div class="p-4 space-y-4">
        <!-- Bonus value and free spins -->
		<?php if (!empty($args['bonus_value']) || !empty($args['free_spins_value'])): ?>
            <div class="flex gap-4">
				<?php if (!empty($args['bonus_value'])): ?>
                    <div class="flex items-center gap-2">
                        <span class="text-2xl font-bold text-green-600">
                            $<?php echo number_format($args['bonus_value']); ?>
                        </span>
                    </div>
				<?php endif; ?>

				<?php if (!empty($args['free_spins_value'])): ?>
                    <div class="flex items-center gap-2">
                        <span class="text-2xl font-bold text-purple-600">
                            <?php echo number_format($args['free_spins_value']); ?>
                        </span>
                        <span class="text-sm text-gray-600">Free Spins</span>
                    </div>
				<?php endif; ?>
            </div>
		<?php endif; ?>

        <!-- Bonus lines -->
		<?php if (!empty($args['first_line'])): ?>
            <h3 class="text-lg font-semibold text-gray-900">
				<?php echo esc_html($args['first_line']); ?>
            </h3>
		<?php endif; ?>

		<?php if (!empty($args['second_line'])): ?>
            <p class="text-sm text-gray-600">
				<?php echo esc_html($args['second_line']); ?>
            </p>
		<?php endif; ?>

        <!-- Description -->
		<?php if (!empty($args['description'])): ?>
            <p class="text-sm text-gray-700 leading-relaxed">
				<?php echo esc_html($args['description']); ?>
            </p>
		<?php endif; ?>

        <!-- Promo code -->
		<?php if (!empty($args['promo_code'])): ?>
            <div class="flex items-center gap-2 p-2 bg-gray-50 rounded">
                <span class="text-sm text-gray-600">Promo Code:</span>
                <code class="px-2 py-1 text-sm font-mono bg-white border border-gray-200 rounded">
					<?php echo esc_html($args['promo_code']); ?>
                </code>
            </div>
		<?php endif; ?>

        <!-- Dates -->
		<?php if (!empty($args['start_date']) || !empty($args['end_date'])): ?>
            <div class="text-sm text-gray-500 space-y-1">
				<?php if (!empty($args['start_date']) && $args['start_date'] instanceof Carbon): ?>
                    <div>
                        <span class="font-medium">Start Date:</span>
						<?php echo $args['start_date']->format('M d, Y'); ?>
                    </div>
				<?php endif; ?>

				<?php if (!empty($args['end_date']) && $args['end_date'] instanceof Carbon): ?>
                    <div>
                        <span class="font-medium">End Date:</span>
						<?php echo $args['end_date']->format('M d, Y'); ?>
                    </div>
				<?php endif; ?>
            </div>
		<?php endif; ?>
    </div>

    <!-- CTA Button -->
	<?php if (!empty($args['affiliate_link'])): ?>
        <div class="p-4 mt-auto border-t border-gray-100">
            <a
                    href="<?php echo esc_url($args['affiliate_link']); ?>"
                    class="block w-full px-4 py-2 text-center text-white bg-indigo-600 hover:bg-indigo-700 rounded-md transition-colors duration-200"
            >
                Claim Bonus
            </a>
        </div>
	<?php endif; ?>
</div>