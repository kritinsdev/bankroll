<?php

namespace Bankroll\Includes\Resource;

use Bankroll\Includes\Helpers;

class ThemeSettings
{
    private array $logo = [];
    private string $prefix = 'bankroll';
    public string $color;

    public function __construct()
    {
        $this->setDefaults();
        return $this;
    }

    private function setDefaults()
    {
        $this->color = "#ebebf2";
        $this->logo = !empty(get_field("{$this->prefix}_logo", 'option')) ? Helpers::parseImageArray(get_field("{$this->prefix}_logo", 'option')) : [];
    }

    public function getSiteLogo(): array
    {
        return $this->logo;
    }
}
