<?php

namespace Bankroll\Includes\Factory;

use Bankroll\Includes\Resource\Casino;

class CasinoFactory
{
    public static array $fields_map = [
        'setTitle' => '',
        'setPermalink' => '',
        'setRatings' => '',
        'setImage' => 'cpt_casino_featured_image',
        'setBonuses' => 'cpt_casino_related_bonuses',
	    'setPros' => 'cpt_casino_pros',
	    'setCons' => 'cpt_casino_cons',
    ];

    public static function create(\WP_Post|int $post): Casino
    {
        $casino = new Casino();
        $id = (is_int($post)) ? $post : $post->ID;
        $casino->setId($id);

        foreach (self::$fields_map as $action => $field_data) {
            if (method_exists($casino, $action)) {
                $value = !empty(get_field($field_data, $id)) ? get_field($field_data, $id) : null;

                if (!empty($value)) {
                    $casino->$action($value);
                } else {
                    $casino->$action();
                }
            }
        }

        return $casino;
    }
}
