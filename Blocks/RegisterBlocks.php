<?php 

namespace Bankroll\Core\Blocks;

use Bankroll\Core\Blocks\FaqBlock;

class RegisterBlocks {
    public function __construct() {
        $this->registerBlocks();
    }

    public function registerBlocks() {
        if( function_exists('acf_add_local_field_group') ):

            acf_add_local_field_group(array(
                'key' => 'group_63e9667019323',
                'title' => 'Blocks',
                'fields' => array(
                    array(
                        'key' => 'field_63e9667077abb',
                        'label' => 'Blocks',
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
                        'layouts' => array(
                            'layout_63e967d677abe' => FaqBlock::registerFields()
                        ),
                        'min' => '',
                        'max' => '',
                        'button_label' => 'New Block',
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'page',
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
            
            endif;		
    }
}