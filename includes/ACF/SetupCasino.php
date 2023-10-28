<?php

namespace Bankroll\Includes\ACF;

class SetupCasino
{
    private string $postType = 'casino';

    public function __construct()
    {
        // $this->registerFields();
        $this->setupHooks();
    }

    public function setupHooks()
    {
        // add_filter("acf/load_field/name={$this->postType}_cpt_related_bonuses", [$this, 'populateBonuses']);
    }
}
