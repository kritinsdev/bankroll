<?php

namespace Bankroll\Includes\Resource;

use Bankroll\Includes\Helpers;

class ThemeSettings
{
    public array $logo = [];
    public string $prefix = 'bankroll';

    public function __construct()
    {
        $this->setDefaults();
        return $this;
    }

    private function setDefaults()
    {
        $this->logo = Helpers::parseImageArray(get_field("{$this->prefix}_logo", 'option'));
    }
}
