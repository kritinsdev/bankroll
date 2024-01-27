<?php

namespace Bankroll\Includes\Resource;

use Bankroll\Includes\Factory\BonusFactory;

class Casino
{
    public int $id;
    public string $name;
    public array $related_bonuses;



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
        $bonus_ids = get_field('cpt_casino_related_bonuses', $this->id);

        if (!empty($bonus_ids)) {
            foreach ($bonus_ids as $id) {
                $bonus = BonusFactory::create($id);

                if (!empty($type) && $type === $bonus->getBonusType()) {
                    $this->related_bonuses[] = $bonus->getBonusData();
                } else {
                    $this->related_bonuses[] = $bonus->getBonusData();
                }
            }
        }

        return $this->related_bonuses;
    }
}
