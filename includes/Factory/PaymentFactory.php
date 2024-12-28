<?php

namespace Bankroll\Includes\Factory;

use Bankroll\Includes\Resource\Casino;

class PaymentFactory
{
    public static array $fields_map = [
        'setTitle' => '',
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
