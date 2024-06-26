<?php

namespace Bankroll\Includes\Resource;

use Bankroll\Includes\Helpers;
use Bankroll\Includes\View\Components;
use Bankroll\Includes\View\Data;

class ThemeSettings
{
    public array $logo;
    public string $prefix = 'bankroll';
    public string $color;

    public function __construct()
    {
        $this->setDefaults();
        return $this;
    }

    private function setDefaults()
    {
        $this->color = "#ebebf2";

        $this->logo = Data::prepareImage(get_field("{$this->prefix}_logo", 'option'));
    }

    public function getSiteLogo(): array
    {
        return $this->logo;
    }
}
