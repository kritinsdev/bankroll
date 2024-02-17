<?php

namespace Bankroll\Includes\Resource;

use Bankroll\Includes\Dto\BonusDto;
use Bankroll\Includes\Enums\BonusType;
use Bankroll\Includes\Traits\HasImage;
use Bankroll\Includes\Traits\Link;

class Bonus
{
    use HasImage;
    use Link;

    public int $id;
    public string $bonus_type;
    public ?int $bonus_for_id;
    public ?string $bonus_for_post_type;
    public string $first_line;
    public ?string $second_line = '';
    public ?int $bonus_value = null;
    public ?int $free_spins_value = null;
    public \DateTime $startDate;
    public \DateTime $endDate;

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setBonusType(string $type): void
    {
        $this->bonus_type = $type;
    }

    public function setBonusForId(int $id): void
    {
        if (!empty($id)) {
            $this->bonus_for_id = $id;
        } else {
            $this->bonus_for_id = null;
        }
    }

    public function setFirstLine(string $first_line)
    {
        $this->first_line = $first_line;
    }

    public function setSecondLine(?string $second_line)
    {
        $this->second_line = $second_line;
    }

    public function setBonusValue(?int $bonus_value)
    {
        $this->bonus_value = $bonus_value;
    }

    public function setFreeSpinsValue(?int $free_spins_value)
    {
        $this->free_spins_value = $free_spins_value;
    }

    public function dto()
    {
        return new BonusDto(
            id: $this->id,
            bonus_type: $this->bonus_type,
            bonus_for_id: $this->bonus_for_id,
            first_line: $this->first_line,
            second_line: $this->second_line,
            bonus_value: $this->bonus_value,
            free_spins_value: $this->free_spins_value,
        );
    }
}
