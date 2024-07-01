<?php

use Bankroll\Includes\View\Components;

$toplist_item = $args;
?>

<div class="flex items-center gap-4 mb-4 last:mb-0 border border-[#eeeeee] rounded-lg">
    <?php Components::image($toplist_item['image'], ['max-w-[120px] rounded-lg']); ?>
    <div>
        <div><?php echo $toplist_item['main_bonus']['first_line'] ?></div>
        <div><?php echo $toplist_item['main_bonus']['second_line'] ?></div>
    </div>
</div>