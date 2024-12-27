<?php

use Bankroll\Includes\View\Components;

//Helpers::prepareHeroData(get_the_ID())
$data = $args;

?>
<div class="pt-[114px] pb-[44px] bg-indigo-800">
    <div class="w-full mx-auto max-w-[1240px]">
        <div class="flex gap-4">
            <div class="w-3/4">
				<?php if ( ! empty( $data['headline'] ) ) : ?>
                    <div class="inline-flex py-1 px-2 bg-indigo-400 text-white rounded">
						<?php echo $data['headline']; ?>
                    </div>
				<?php endif; ?>
                <h1 class="text-[58px] leading-normal font-bold text-white">
					<?php echo $data['title']; ?>
                </h1>

                <div class="text-white text-[18px]">
					<?php echo $data['text']; ?>
                </div>

				<?php if ( ! empty( $data['image'] ) ) : ?>
					<?php Components::image( $data['image'] ); ?>
				<?php endif; ?>
            </div>

            <div class="flex flex-1 flex-col gap-2">
                <?php foreach ($data['bonuses'] as $bonus) : ?>
                    <div class="bg-indigo-400 p-2 rounded-[10px]">
                        <div class="flex gap-4">
                            <div>
		                        <?php Components::image( $bonus['image'], [ 'w-14', 'rounded-[10px]' ] ); ?>
                            </div>

                            <div>
		                        <?php echo $bonus['first_line']; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

		<?php if ( ! empty( $data['core_pages'] ) ) : ?>
            <div class="mt-4">
                <div class="flex gap-4">
					<?php foreach ( $data['core_pages'] as $corePage ) : ?>
                        <a href="<?php echo $corePage['core_page_link']; ?>"
                           class="flex items-center gap-4 bg-indigo-400 p-2 rounded rounded-lg">
                            <div class="flex flex-col">
                                <span class="font-bold"><?php echo $corePage['core_page_title']; ?></span>
                                <span class="text-sm"><?php echo $corePage['core_page_subtitle']; ?></span>
                            </div>

							<?php Components::icon( $corePage['bankroll_icons'] ); ?>
                        </a>
					<?php endforeach; ?>
                </div>
            </div>
		<?php endif; ?>
    </div>
</div>