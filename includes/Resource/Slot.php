<?php

namespace Bankroll\Includes\Resource;

class Slot
{
    private int $id;
    private string $permalink;
    private string $name;
    private float $rtp;
    private int $maxMultiplier;
    private array $provider;
    private array $image;

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getId(): int {
        return $this->id;
    }

    public function setPermalink(string $permalink): void {
        $this->permalink = $permalink;
    }

    public function getPermalink(): string {
        return $this->permalink;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setImage(array $image): void {
        $this->image = $image;
    }

    public function getImage(): array {
        return $this->image;
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
        return $this->maxMultiplier;
    }

    public function setProvider(array $terms): void {
        $this->provider = $terms;
    }   

    public function getProvider() {
        $providers = [];
        foreach($this->provider as $provider) {
            $providers[] = $provider->name;
        }

        return $providers;
    }
}
