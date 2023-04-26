<?php

namespace Bankroll\Includes;

class Importer
{
    use Singleton;

    public function __construct() {
        add_action('admin_menu', [$this, 'createAdminPage']);
    }

    public function createAdminPage() 
    {
        add_submenu_page(
            'edit.php?post_type=slot',
            'Import',
            'Import slots',
            'manage_options',
            'custom-admin-page',
            [$this, 'createImportPage']
        );
    }
    
    public function createImportPage()
    {
        get_template_part('parts/admin/import-slots');
    }
}