<?php

use Bankroll\Includes\View\Components;

$hero = $args;

?>
<div class="py-8 bg-[#1a1a1a]">
    <div class="w-full mx-auto max-w-[1240px]">
        <h1 class="text-[48px] font-bold text-white">
            <?php echo $hero['title']; ?>
        </h1>

        <div class="text-white">
            <?php echo $hero['text']; ?>
        </div>

        <?php if (!empty($hero['image'])) : ?>
            <?php Components::image($hero['image']); ?>
        <?php endif; ?>
    </div>
</div>