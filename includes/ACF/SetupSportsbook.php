<?php

namespace Bankroll\Includes\ACF;

class SetupSportsbook
{
    private string $postType = 'sportsbook';

    public function __construct()
    {
        $this->registerFields();
        $this->setupHooks();
    }

    public function setupHooks()
    {
    }

    public function registerFields()
    {
        $data = [];
        $data['blocks'] = Helpers::globalBlocks($this->postType);
        $fields = Helpers::globalTabs($this->postType, $data);

        // echo '<pre>';
        // print_r($fields);
        // die;


        add_action('acf/include_fields', function () use ($fields) {
            if (!function_exists('acf_add_local_field_group')) {
                return;
            }

            acf_add_local_field_group($fields);
        });
    }

    public function blocks()
    {
        return [];
    }
}
