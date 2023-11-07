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
        $data['blocks'] = Helpers::blocks($this->postType);
        $fields = Helpers::tabs($this->postType, $data);

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
