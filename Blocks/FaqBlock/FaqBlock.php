<?php

namespace Bankroll\Core\Blocks\FaqBlock;
use Bankroll\Core\Blocks\BlockInterface;

class FaqBlock implements BlockInterface {
    public function __construct() {
        echo 'faq block';
    }

    public function registerFields(): void {
        
    }
}

