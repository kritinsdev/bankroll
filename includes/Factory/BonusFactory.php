<?php

namespace Bankroll\Includes\Factory;

use Bankroll\Includes\Resource\Bonus;

class BonusFactory
{
    public static array $fields_map = [
        'setBonusType' => 'cpt_bonus_type',
        'setBonusForCasinoId' => 'cpt_bonus_for_casino_id',
        'setFirstLine' => 'cpt_bonus_bonus_info_cpt_bonus_first_line',
        'setSecondLine' => 'cpt_bonus_bonus_info_cpt_bonus_second_line',
        'setBonusValue' => 'cpt_bonus_bonus_info_cpt_bonus_amount_value',
        'setFreeSpinsValue' => 'cpt_bonus_bonus_info_cpt_freespins_amount_value',
        // 'setBonusStartDate' => ['cpt_bonus_bonus_date_group', 'cpt_bonus_start_date'],
        // 'setBonusEndDate' => ['cpt_bonus_bonus_date_group', 'cpt_bonus_end_date'],
        // 'setAffiliateLink' => 'cpt_bonus_link_id',
    ];

    public static function create(\WP_Post|int $post): Bonus
    {
        $bonus = new Bonus();

        $id = (is_int($post)) ? $post : $post->ID;
        $bonus->setId($id);

        foreach (self::$fields_map as $action => $field_data) {
            if ($action === 'setBonusType') {
            }
            $value = !empty(get_field($field_data, $id)) ? get_field($field_data, $id) : null;
            $bonus->$action($value);
        }

        return $bonus;
    }
}
