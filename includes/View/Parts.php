<?php

namespace Bankroll\Core\View;

class Parts {
    public static function navigation($args = []) {
        get_template_part('parts/global/navigation', null, ['data' => ['']]);
    }
}