<?php

namespace Bankroll\Core\Resource;

class Slot
{
    private string $name;
    private float $rtp;
    private int $maxMultiplier;
    private mixed $provider;

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

    public function setProvider(int $termId): void {
        $this->provider = get_term($termId, 'provider');
    }

    public function getProvider(): \WP_Term {
        return $this->provider;
    }
}
