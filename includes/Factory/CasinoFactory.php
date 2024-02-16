<?php

namespace Bankroll\Includes\Factory;

use Bankroll\Includes\Resource\Casino;

class CasinoFactory
{
    public static array $fields_map = [
        'setTitle' => '',
        'setImage' => '',
        'setPermalink' => '',
        'setBonuses' => 'cpt_casino_related_bonuses',
    ];

    public static function create(\WP_Post|int $post, array $settings = []): Casino
    {
        $casino = new Casino();
        $id = (is_int($post)) ? $post : $post->ID;
        $casino->setId($id);

        foreach (self::$fields_map as $action => $field_data) {
            $value = !empty(get_field($field_data, $id)) ? get_field($field_data, $id) : null;

            if (!empty($value)) {
                $casino->$action($value);
            } else {
                $casino->$action();
            }
        }


        return $casino;
    }
}
