<?php

namespace Bankroll\Includes\Ajax;

use Bankroll\Includes\Singleton;

class AjaxFunctions
{
    use Singleton;

    public function __construct()
    {
        new LoadMore();
        new Filters();
    }

}