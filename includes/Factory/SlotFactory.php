<?php 

namespace Bankroll\Includes\Factory;

use Bankroll\Includes\Resource\Slot;

class SlotFactory {
    public static function create(\WP_Post|int $post): Slot  {
        $slot = new Slot();
        $id = (is_int($post)) ? $post : $post->ID;

        $image = (get_field('slot_image', $id)) ? get_field('slot_image', $id) : [];

        $slot->setId($id);
        $slot->setPermalink(get_the_permalink($id));
        $slot->setProvider(wp_get_post_terms($id, 'provider'));
        $slot->setName(get_the_title($id));
        $slot->setRtp(get_field('slot_rtp', $id));
        $slot->setMaxMultiplier(get_field('slot_max_multiplier', $id));
        $slot->setImage($image);

        return $slot;
    }
}