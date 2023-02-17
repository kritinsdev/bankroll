<?php
$postType = ucfirst($args['data']['block_board_post_type']);
$className = 'Bankroll\Includes\Factory\\' . $postType . 'Factory';

?>

<div>
    <?php foreach ($args['data'] as $postItem):
    var_dump($postItem);
        $item = $className::create($postItem); ?>
        <div>
            <?php var_dump($item->getName()); ?>
        </div>
    <?php endforeach; ?>
</div>