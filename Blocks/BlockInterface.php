<?php

namespace Bankroll\Blocks;

interface BlockInterface
{

    public function register(): array;

    public function registerSubFields(): array;

    public function prepareData(array $data): void;

    public function view(): mixed;

    public function enqueue(): void;

    public function registerAjax(): void;
}
