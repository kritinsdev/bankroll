<?php

namespace Bankroll\Includes\Resource;

use Bankroll\Includes\Traits\HasImage;

class Bonus
{
    use HasImage;

    private int $id;
    private array $bonusType;
    private string $bonusForPostType;
    private string $firstLine;
    private string $secondLine;
    private bool $enableSDate;
    // private \DateTime $startDate;
    // private \DateTime $endDate;

    public function getImage(): array
    {
        return [];
    }

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
        ];

        return $data;
    }
}
