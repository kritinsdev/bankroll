<?php

use Bankroll\Includes\View\Components;

$casino = $args;

?>

<div class="flex flex-col gap-4 p-4 border border-[#eeeeeee]">
    <div>
        <?php echo $casino['title']; ?>
    </div>

    <div>
        <?php Components::image($casino['image'], ['max-w-[180px]']); ?>
    </div>

    <div>
        <div><?php echo $casino['main_bonus']['first_line']; ?></div>
        <div><?php echo $casino['main_bonus']['second_line']; ?></div>
    </div>
</div>