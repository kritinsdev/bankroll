<?php

namespace Bankroll\Includes\Factory;

use Bankroll\Includes\Resource\Bonus;

class BonusFactory
{
    public static function create(\WP_Post|int $post): Bonus
    {
        $bonus = new Bonus();
        $id = (is_int($post)) ? $post : $post->ID;

        $bonus->setId($id);
        $bonus->setBonusType(get_field('cpt_bonus_type', $id));

        return $bonus;
    }
}
