<?php
$hero = $args;
?>
<div class="hero">
    <div class="hero-wrap">
        <div class="hero-main">
            <h1 class="hero-title">
                <?php echo $hero['title']; ?>
            </h1>
            <div class="hero-text">
                <?php echo $hero['text']; ?>
            </div>
        </div>

        <div>
            <?php var_dump($hero['settings']); ?>
        </div>
    </div>
</div>