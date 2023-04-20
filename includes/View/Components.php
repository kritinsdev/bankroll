<?php

namespace Bankroll\Includes\View;

class Components {
    public static function loadMoreButton(bool $show, array $remaining): void
    {
        get_template_part('parts/blocks/board-load-more', null, ['data' => ['show' => $show, 'remaining' => $remaining]]);
    }
}