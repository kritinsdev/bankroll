<?php 

namespace Bankroll\Includes\Factory;

use Bankroll\Includes\Resource\Slot;

class SlotFactory {
    public static function create(\WP_Post|int $post): Slot  {
        $slot = new Slot();

        $slot->setId(is_int($post) ? $post : $post->ID);
        $slot->setPermalink(get_the_permalink($post));
        $slot->setName(get_the_title($post));
        $slot->setRtp(get_field('slot_rtp', $post));
        $slot->setMaxMultiplier(get_field('slot_max_multiplier', $post));
        $slot->setProvider(get_field('slot_provider', $post));
        $slot->setImage(get_field('slot_image', $post));

        return $slot;
    }
}