<?php

namespace Bankroll\Includes\Factory;

use Bankroll\Includes\Resource\Casino;

class CasinoFactory
{
    public static function create(\WP_Post|int $post): Casino
    {
        $casino = new Casino();
        $id = (is_int($post)) ? $post : $post->ID;

        $casino->setId($id);

        $casino->setCasinoBonuses();

        return $casino;
    }
}
