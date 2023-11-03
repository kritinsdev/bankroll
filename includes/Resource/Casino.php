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

    public function getCasinoBonuses(): array
    {
        $bonusIds = get_field('cpt_casino_related_bonuses', $this->id);

        $bonuses = [];
        foreach ($bonusIds as $id) {
            $bonuses[] = BonusFactory::create($id);
        }

        return $bonuses;
    }
}
