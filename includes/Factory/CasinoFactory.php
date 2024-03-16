<?php

namespace Bankroll\Includes\Factory;

use Bankroll\Includes\Resource\Casino;

class CasinoFactory
{
    public static array $fields_map = [
        'setTitle' => '',
        'setPermalink' => '',
        'setImage' => 'cpt_casino_featured_image',
        'setBonuses' => 'cpt_casino_related_bonuses',
    ];

    public static function create(\WP_Post|int $post): Casino
    {
        $resource = new Casino();
        $id = (is_int($post)) ? $post : $post->ID;
        $resource->setId($id);

        foreach (self::$fields_map as $action => $field_data) {
            if (method_exists($resource, $action)) {
                $value = !empty(get_field($field_data, $id)) ? get_field($field_data, $id) : null;

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
