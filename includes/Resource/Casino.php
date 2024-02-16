<?php

namespace Bankroll\Includes\Resource;

use Bankroll\Includes\Factory\BonusFactory;
use Bankroll\Includes\Traits\HasImage;

class Casino
{
    use HasImage;

    public int $id;
    public string $title;
    public string $permalink;
    public array $image;
    public array $bonuses;

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
                $this->bonuses[] = $bonus->getBonusData();
            }
        }
    }
}
