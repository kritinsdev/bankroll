<?php

namespace Bankroll\Includes\ACF;

class SetupBonus
{
    public function __construct()
    {
        // $this->registerFields();
        $this->setupHooks();
    }

    public function setupHooks()
    {
        add_filter('acf/load_field/name=cpt_bonus_for_casino', [$this, 'populateCasinos']);
    }

    public function populateCasinos(array $field): array
    {
        global $post;

        if (isset($post->post_type, $post->ID) && $post->post_type != 'acf-field-group') {
            $casinos = get_posts([
                'post_type' => 'casino',
                'numberposts' => -1,
            ]);

            if (empty($casinos)) {
                return $field;
            }

            $choices = [];
            foreach ($casinos as $casino) {
                $choices[$casino->ID] = $casino->post_title;
            }

            $field['choices'] = [];

            if (is_array($choices)) {

                foreach ($choices as $key => $choice) {

                    $field['choices'][$key] = $choice;
                }
            }
        }

        return $field;
    }

    public function registerFields()
    {
    }
}
