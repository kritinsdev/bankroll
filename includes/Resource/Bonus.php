<?php

namespace Bankroll\Includes\Resource;

use Bankroll\Includes\Enums\BonusType;
use Bankroll\Includes\Traits\HasImage;
use Bankroll\Includes\Traits\Link;

class Bonus
{
    use HasImage;
    use Link;

    public int $id;
    public string $bonus_type;
    public int $bonus_for_id;
    public string $bonus_for_post_type;
    public string $first_line;
    public ?string $second_line;
    public ?int $bonus_value;
    public ?int $free_spins_value;
    public \DateTime $startDate;
    public \DateTime $endDate;

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setBonusType(string $type): void
    {
        $this->bonus_type = $type;
    }

    public function getBonusType(): string
    {
        return BonusType::fromName($this->bonus_type);
    }

    public function setBonusForId(int $id): void
    {
        if (!empty($id)) {
            $this->bonus_for_id = $id;
        } else {
            $this->bonus_for_id = null;
        }
    }

    public function getBonusForId(): int
    {
        return $this->bonus_for_id;
    }

    public function setFirstLine(string $first_line)
    {
        $this->first_line = $first_line;
    }

    public function getFirstLine(): ?string
    {
        return !empty($this->first_line) ? $this->first_line : null;
    }

    public function setSecondLine(?string $second_line)
    {
        $this->second_line = $second_line;
    }

    public function getSecondLine(): ?string
    {
        return !empty($this->second_line) ? $this->second_line : null;
    }

    public function setBonusValue(?int $bonus_value)
    {
        $this->bonus_value = $bonus_value;
    }

    public function getBonusValue(): ?int
    {
        return !empty($this->bonus_value) ? $this->bonus_value : null;
    }

    public function setFreeSpinsValue(?int $free_spins_value)
    {
        $this->free_spins_value = $free_spins_value;
    }

    public function getFreeSpinsValue(): ?int
    {
        return !empty($this->free_spins_value) ? $this->free_spins_value : null;
    }

    public function getBonusData(): array
    {
        $data = [
            'id' => $this->getId(),
            'bonus_type' => $this->getBonusType(),
            'first_line' => $this->getFirstLine(),
            'second_line' => $this->getSecondLine(),
            'bonus_value' => $this->getBonusValue(),
            'free_spins_value' => $this->getFreeSpinsValue(),
            'image' => $this->getFeaturedImage($this->getBonusForId()),
            'link' => $this->getLink($this->bonus_for_id),
        ];

        return $data;
    }
}
