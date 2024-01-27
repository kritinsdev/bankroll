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
        // add_filter("acf/load_field/name=cpt_{$this->postType}_related_bonuses", [$this, 'testF']);
    }

    public function testF($args)
    {
        dump($args);
    }
}
