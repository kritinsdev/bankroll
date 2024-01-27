<?php

namespace Bankroll\Includes\Resource;

use Bankroll\Includes\Traits\HasImage;

class Bonus
{
    use HasImage;

    public int $id;
    public array $bonusType;
    public int $bonusForCasino;
    public string $bonusForPostType;
    public string $firstLine;
    public string $secondLine;
    public bool $enableSDate;
    // private \DateTime $startDate;
    // private \DateTime $endDate;

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setBonusType(array $type)
    {
        $this->bonusType = $type;
    }

    /**
     * return label or value
     */
    public function getBonusType(string $returnValue = 'value'): string
    {
        return $this->bonusType[$returnValue];
    }

    public function setBonusForCasinoId(array $ids)
    {
        if (!empty($ids[0])) {
            $this->bonusForCasino = $ids[0];
        } else {
            $this->bonusForCasino = null;
        }
    }

    public function getBonusForCasinoId(): int
    {
        return $this->bonusForCasino;
    }

    public function setFirstLine(string $firstLine)
    {
        $this->firstLine = $firstLine;
    }

    public function getFirstLine(): string
    {
        return $this->firstLine;
    }

    public function setSecondLine(string $secondLine)
    {
        $this->secondLine = $secondLine;
    }

    public function getSecondLine(): string
    {
        return $this->secondLine;
    }

    public function getBonusData(): array
    {
        $data = [
            'id' => $this->getId(),
            'bonusType' => $this->getBonusType(),
            'firstLine' => $this->getFirstLine(),
            'secondLine' => $this->getSecondLine(),
            'image' => $this->getImage($this->getBonusForCasinoId())
        ];

        return $data;
    }
}
