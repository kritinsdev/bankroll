<?php

namespace Bankroll\Blocks;

interface BlockInterface
{

    public function register(): array;

    public function registerSubFields(): array;

    public function prepareData(array $data): array;

    public function view(array $data): mixed;

    public function enqueue(): void;

    public function registerAjax(): void;
}
