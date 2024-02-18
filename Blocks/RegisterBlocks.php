<?php

namespace Bankroll\Blocks;

use Bankroll\Blocks\Board\Board;
use Bankroll\Blocks\Content\Content;
use Bankroll\Blocks\Toplist\Toplist;

class RegisterBlocks
{
    public function __construct()
    {
        $this->registerBlocks();
    }

    public function registerBlocks()
    {
        if (!function_exists('acf_add_local_field_group')) {
            return;
        }

        acf_add_local_field_group(array(
            'key' => 'group_63e9667019323',
            'title' => 'Blocks',
            'fields' => array(
                array(
                    'key' => 'field_63e9667077abb',
                    'label' => 'Select Blocks',
                    'name' => 'blocks',
                    'aria-label' => '',
                    'type' => 'flexible_content',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'layouts' => $this->registerLayouts(),
                    'min' => '',
                    'max' => '',
                    'button_label' => 'New Block',
                ),
            ),
            'location' => $this->registerLocationForCpts(),
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

    private function registerLocationForCpts(): array
    {
        $supported_cpts = ['page', 'casino'];
        $location = [];

        foreach ($supported_cpts as $cpt) {
            $location[][] = [
                'param' => 'post_type',
                'operator' => '==',
                'value' => $cpt
            ];
        }

        return $location;
    }

    private function registerLayouts(): array
    {
        return [
            (new Board('board'))->register(),
            // (new Content())->setAcfFields(),
            // (new Toplist())->setAcfFields(),
        ];
    }
}
