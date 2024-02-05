<?php

namespace Bankroll\Includes\Resource;

use Bankroll\Includes\Factory\BonusFactory;
use Bankroll\Includes\Traits\HasImage;

class Casino
{
    use HasImage;

    public int $id;
    public string $name;
    public array $image;
    public array $related_bonuses;

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setCasinoBonuses(): void
    {
        $bonus_ids = get_field('cpt_casino_related_bonuses', $this->id);
        if (!empty($bonus_ids)) {

            $existing_bonuses = [];
            foreach ($bonus_ids as $id) {
                if (get_post_status($id)) {
                    $existing_bonuses[] = $id;
                }
            }

            foreach ($existing_bonuses as $id) {
                $bonus = BonusFactory::create($id);
                $this->related_bonuses[] = $bonus->getBonusData();
            }
        }
    }

    public function setImage()
    {
        $this->image = $this->getImage($this->id);
    }
}
