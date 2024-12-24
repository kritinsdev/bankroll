<?php

global $themeSettings;

use Bankroll\Includes\View\Components;

$data = $themeSettings->getFooterData();

?>

<footer class="footer bg-[#1a1a1a] text-white py-8">
    <div class="w-full mx-auto max-w-[1240px]">
        <div class="flex flex-col gap-10">
			<?php if ( ! empty( $data['navigations'] ) ) : ?>
                <div class="flex gap-8">
					<?php foreach ( $data['navigations'] as $key => $navigation ) : ?>
                        <div>
                            <span class="mb-4 font-bold text-lg"><?php echo $key; ?></span>

                            <div class="flex flex-col gap-2">
								<?php foreach ( $navigation as $nav ) : ?>
                                    <a href="#">
										<?php echo $nav['title']; ?>
                                    </a>
								<?php endforeach; ?>
                            </div>
                        </div>

					<?php endforeach; ?>
                </div>
			<?php endif; ?>

			<?php if ( ! empty( $data['text'] ) ) : ?>
                <div>
					<?php echo $data['text']; ?>
                </div>
			<?php endif; ?>


            <div class="flex justify-between items-center">
                <p>© Bankroll.com. All rights reserved. 2016 - 2024</p>

				<?php if ( ! empty( $data['images'] ) ) : ?>
                    <div class="flex gap-6">
						<?php foreach ( $data['images'] as $image ) : ?>
							<?php Components::image( $image, [ 'max-w-32', 'max-h-10' ] ); ?>
						<?php endforeach; ?>
                    </div>
				<?php endif; ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>