<?php

namespace Bankroll\Includes\Resource;

use Bankroll\Includes\Factory\BonusFactory;

class Casino
{
    private int $id;

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCasinoBonuses(string $type = null): array
    {
        $bonusIds = get_field('cpt_casino_related_bonuses', $this->id);
        $bonuses = [];

        if (!empty($bonusIds)) {
            foreach ($bonusIds as $id) {
                $bonus = BonusFactory::create($id);

                if (!empty($type) && $type === $bonus->getBonusType()) {
                    $bonuses[] = $bonus->getBonusData();
                } else {
                    $bonuses[] = $bonus->getBonusData();
                }
            }
        }

        return $bonuses;
    }
}
