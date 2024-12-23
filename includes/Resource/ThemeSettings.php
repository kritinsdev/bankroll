<?php

namespace Bankroll\Includes\Resource;

use Bankroll\Includes\View\Components;
use Bankroll\Includes\View\Helpers;

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

        $this->logo = Helpers::prepareImageData(get_field("{$this->prefix}_logo", 'option'));
    }

    public function getSiteLogo(): array
    {
        return $this->logo;
    }
}
