<?php 

namespace Bankroll\Includes\Factory;

use Bankroll\Core\Resource\Slot;

class SlotFactory {
    public static function create($post): Slot  {
        $slot = new Slot();

        $slot->setName(get_the_title($post));
        $slot->setRtp(get_field('slot_rtp', $post));
        $slot->setMaxMultiplier(get_field('slot_max_multiplier', $post));
        $slot->setProvider(get_field('slot_provider'));

        return $slot;
    }
}