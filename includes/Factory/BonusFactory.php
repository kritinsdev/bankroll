<?php

namespace Bankroll\Includes\Factory;

use Bankroll\Includes\Resource\Bonus;

class BonusFactory
{
    public static array $fieldsMap = [
        'setBonusType' => 'cpt_bonus_type',
        'setBonusForCasinoId' => 'cpt_bonus_for_casino',
        'setFirstLine' => 'cpt_bonus_first_line',
        'setSecondLine' => 'cpt_bonus_second_line',
    ];

    public static function create(\WP_Post|int $post): Bonus
    {
        $bonus = new Bonus();

        $id = (is_int($post)) ? $post : $post->ID;
        $bonus->setId($id);

        foreach (self::$fieldsMap as $action => $fieldKey) {
            $bonus->$action(get_field($fieldKey, $id));
        }

        return $bonus;
    }
}
