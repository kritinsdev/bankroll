<?php

namespace Bankroll\Includes\Resource;

use Bankroll\Includes\Helpers;

class ThemeSettings
{
    private array $logo = [];
    private string $prefix = 'bankroll';

    public function __construct()
    {
        $this->setDefaults();
        return $this;
    }

    private function setDefaults()
    {
        $this->logo = Helpers::parseImageArray(get_field("{$this->prefix}_logo", 'option'));
    }

    public function getSiteLogo(): array
    {
        return $this->logo;
    }
}
