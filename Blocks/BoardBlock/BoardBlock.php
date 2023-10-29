<?php

namespace Bankroll\Includes\Blocks;

use Bankroll\Blocks\BlockInterface;

class BoardBlock implements BlockInterface
{
    public function __construct()
    {
        echo 'Board block';
    }

    public static function registerFields()
    {
        //register fields here
    }
}
