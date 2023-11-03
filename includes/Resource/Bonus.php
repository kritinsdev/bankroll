<?php

namespace Bankroll\Includes\Resource;

class Bonus
{
    private int $id;
    private string $bonusType;
    private string $bonusForPostType;
    private string $firstLine;
    private string $secondLine;
    private bool $enableSDate;
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
        $this->bonusType = $type['label'];
    }

    public function getBonusType(): string
    {
        return $this->bonusType;
    }
}
