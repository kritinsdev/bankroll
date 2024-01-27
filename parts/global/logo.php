<?php

if (empty($args)) {
    return;
}

?>
<a href="/">
    <img src="<?php echo $args['url']; ?>" alt="<?php echo $args['alt']; ?>" width="<?php echo $args['width']; ?>" height="<?php echo $args['height']; ?>">
</a>