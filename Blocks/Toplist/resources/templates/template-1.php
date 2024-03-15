<?php
$toplist_item = $args;
?>

<div>
    <div>
        <?php echo $toplist_item['title']; ?>
    </div>
    <div>
        <img class="testimg" src="<?php echo $toplist_item['image']['url']; ?>" alt="">
    </div>
    <div>
        <?php print_r($toplist_item['main_bonus']); ?>
    </div>
</div>