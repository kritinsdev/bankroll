<?php

namespace Bankroll\Includes\Resource;

class Casino
{
    private int $id;

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setCasinoBonuses()
    {
    }

    public function getCasinoBonuses()
    {
        return [];
    }
}
