<?php
$casino = $args;

// dump($casino, 1);
?>

<div class="casino-item">
    <div>
        <?php echo $casino['title']; ?>
    </div>

    <div>
        <div><?php echo $casino['main_bonus']['first_line']; ?></div>
        <div><?php echo $casino['main_bonus']['second_line']; ?></div>
    </div>
</div>