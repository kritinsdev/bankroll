<?php

use Bankroll\Includes\Helpers;

$casino = $args;

?>

<div class="casino-item">
    <div>
        <?php echo $casino['title']; ?>
    </div>

    <div>
        <?php Helpers::image($casino['image']); ?>
    </div>

    <div>
        <div><?php echo $casino['main_bonus']['first_line']; ?></div>
        <div><?php echo $casino['main_bonus']['second_line']; ?></div>
    </div>
</div>