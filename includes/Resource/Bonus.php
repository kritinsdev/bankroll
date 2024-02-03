<?php

namespace Bankroll\Includes\Resource;

use Bankroll\Includes\Enums\BonusType;
use Bankroll\Includes\Traits\HasImage;

class Bonus
{
    use HasImage;

    public int $id;
    public string $bonus_type;
    public int $bonus_for_casino;
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

    public function setBonusForCasinoId(int $id)
    {
        if (!empty($id)) {
            $this->bonus_for_casino = $id;
        } else {
            $this->bonus_for_casino = null;
        }
    }

    public function getBonusForCasinoId(): int
    {
        return $this->bonus_for_casino;
    }

    public function setFirstLine(string $first_line)
    {
        $this->first_line = $first_line;
    }

    public function getFirstLine(): string
    {
        return $this->first_line;
    }

    public function setSecondLine(?string $second_line)
    {
        $this->second_line = $second_line;
    }

    public function getSecondLine(): ?string
    {
        return $this->second_line;
    }

    public function setBonusValue(?int $bonus_value)
    {
        $this->bonus_value = $bonus_value;
    }

    public function getBonusValue(): ?int
    {
        return $this->bonus_value;
    }

    public function setFreeSpinsValue(?int $free_spins_value)
    {
        $this->free_spins_value = $free_spins_value;
    }

    public function getFreeSpinsValue(): ?int
    {
        return $this->free_spins_value;
    }

    public function getBonusData(): array
    {
        $data = [
            'id' => $this->getId(),
            'bonus_type' => $this->getBonusType(),
            'first_line' => $this->getFirstLine(),
            'second_line' => $this->getSecondLine(),
            'image' => $this->getImage($this->getBonusForCasinoId())
        ];

        return $data;
    }
}
