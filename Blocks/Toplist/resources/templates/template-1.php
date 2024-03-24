<?php

use Bankroll\Includes\View\Components;

$toplist_item = $args;
?>

<div class="toplist-item">
    <div>
        <?php Components::image($toplist_item['image'], ['toplist-image']); ?>
    </div>
    <div>
        <div><?php echo $toplist_item['main_bonus']['first_line'] ?></div>
        <div><?php echo $toplist_item['main_bonus']['second_line'] ?></div>
    </div>
</div>