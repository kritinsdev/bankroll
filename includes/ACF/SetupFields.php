<?php

namespace Bankroll\Includes\ACF;

use Bankroll\Includes\ACF\SetupBonus;

class SetupFields
{
    public function __construct()
    {
        new SetupBonus();
        new SetupCasino();
    }
}
