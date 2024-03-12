<?php

namespace Bankroll\Includes\Resource;

use Bankroll\Includes\Enums\BonusType;
use Bankroll\Includes\Dto\BonusDto;
use Bankroll\Includes\Factory\BonusFactory;
use Bankroll\Includes\Traits\HasImage;
use Bankroll\Includes\Traits\ToArray;

class Casino
{
    use HasImage;
    use ToArray;

    public int $id;
    public string $title;
    public string $permalink;
    public array $image = [];
    public array $bonuses = [];
    public array $main_bonus = [];
    public array $payment_methods = [];

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setImage()
    {
        $this->image = $this->getFeaturedImage($this->id);
    }

    public function setTitle()
    {
        $this->title = get_the_title($this->id);
    }

    public function setPermalink()
    {
        $this->permalink = get_the_permalink($this->id);
    }

    public function setBonuses(array $bonus_ids): void
    {
        if (!empty($bonus_ids)) {

            $existing_bonuses = [];
            foreach ($bonus_ids as $id) {
                if (get_post_status($id)) {
                    $existing_bonuses[] = $id;
                }
            }

            foreach ($existing_bonuses as $id) {
                $bonus = BonusFactory::create($id);

                if ($bonus->bonus_type == BonusType::MainBonus->key()) {
                    $this->setMainBonus($bonus);
                    continue;
                }

                $this->bonuses[] = $bonus->data();
            }
        }
    }

    public function setMainBonus(Bonus $bonus): void
    {
        if (!empty($bonus)) {
            $this->main_bonus = $bonus->data();
        }
    }

    public function setPaymentMethods(): void
    {
    }
}
