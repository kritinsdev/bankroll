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
        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group(array(
                'key' => 'group_653aba5feafb1',
                'title' => 'Bonus',
                'fields' => array(
                    array(
                        'key' => 'field_653aba60206fb',
                        'label' => 'Bonus For Post Type',
                        'name' => 'bonus_for_post_type',
                        'aria-label' => '',
                        'type' => 'select',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'casino' => 'Casino',
                            'sportsbook' => 'sportsbook'
                        ),
                        'default_value' => false,
                        'return_format' => 'value',
                        'multiple' => 0,
                        'allow_null' => 0,
                        'ui' => 0,
                        'ajax' => 0,
                        'placeholder' => '',
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'bonus',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => true,
                'description' => '',
                'show_in_rest' => 0,
            ));
        }
    }
}
