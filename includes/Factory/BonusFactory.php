<?php

namespace Bankroll\Includes\Factory;

use Bankroll\Includes\Resource\Bonus;

class BonusFactory
{
    public static array $fields_map = [
        'setBonusType' => 'cpt_bonus_type',
        'setBonusForId' => 'cpt_bonus_for_id',
        'setFirstLine' => 'cpt_bonus_info_first_line',
        'setSecondLine' => 'cpt_bonus_info_second_line',
        'setBonusValue' => 'cpt_bonus_info_amount_value',
        'setFreeSpinsValue' => 'cpt_bonus_info_freespins_amount_value',
        'setWageringRequirement' => 'cpt_bonus_info_wagering_requiremet',
        'setDescription' => 'cpt_bonus_info_description',
        'setPromoCode' => 'cpt_bonus_info_promo_code',
        'setStartDate' => 'cpt_bonus_date_group_start_date',
        'setEndDate' => 'cpt_bonus_date_group_end_date',
        'setTncText' => 'cpt_bonus_terms_group_text',
        'setTncLink' => 'cpt_bonus_terms_group_link',
	    'setImage' => '',
        'setAffiliateLink' => '',
    ];

    public static function create(\WP_Post|int $post): Bonus
    {
        $resource = new Bonus();
        $id = (is_int($post)) ? $post : $post->ID;
        $resource->setId($id);

        foreach (self::$fields_map as $action => $data) {
            if (method_exists($resource, $action)) {
                $value = !empty(get_field($data, $id)) ? get_field($data, $id) : null;

                if (!empty($value)) {
                    $resource->$action($value);
                } else {
                    $resource->$action();
                }
            }
        }

        return $resource;
    }
}
