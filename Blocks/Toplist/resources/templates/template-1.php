<?php
$toplist_item = $args;

// dump($toplist_item);
?>

<div>
    <div>
        <?php echo $toplist_item['title']; ?>
    </div>
    <div>
        <img class="testimg" src="<?php echo $toplist_item['image']['url']; ?>" alt="">
    </div>
</div>

<style>
    .testimg {
        width: 200px;
        height: 60px;
    }
</style>