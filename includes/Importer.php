<?php

namespace Bankroll\Includes;

class Importer
{
    use Singleton;


    public function __construct() {
        add_action('admin_menu', [$this, 'createImportPage']);
    }

    public function createImportPage() 
    {
        
    }
}