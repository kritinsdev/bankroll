<?php

use Bankroll\Includes\View\Components;

if (empty($args)) {
    return;
}

?>
<a href="/">
    <?php Components::image($args); ?>
</a>