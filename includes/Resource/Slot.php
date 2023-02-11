<?php

namespace Bankroll\Core\Resource;

class Slot
{
    private string $name;
    private float $rtp;
    private int $maxMultiplier;
    private Provider $provider;

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setRtp(float $rtp): void {
        $this->rtp = $rtp;
    }

    public function getRtp(): float {
        return $this->rtp;
    }

    public function setMaxMultiplier(int $maxMultiplier): void {
        $this->maxMultiplier = $maxMultiplier;
    }

    public function getMaxMultiplier(): string {
        return $this->maxMultiplier . "X";
    }

    public function setProvider($termId): void {
        $this->provider = new Provider($termId);
    }

    public function getProvider($termId): string {
        return '123';
    }
}
