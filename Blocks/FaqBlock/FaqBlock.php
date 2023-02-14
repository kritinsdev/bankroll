<?php

namespace Bankroll\Includes\Blocks;

use Bankroll\Blocks\BlockInterface;

class FaqBlock implements BlockInterface {
    public function __construct() {
        echo 'faq block';
    }

    public static function registerFields(): array {
        return array(
            'key' => 'layout_63e967d677abe',
            'name' => 'block_faq',
            'label' => 'FAQ',
            'display' => 'block',
            'sub_fields' => array(
                array(
                    'key' => 'field_63e9687677ac2',
                    'label' => 'FAQ Group',
                    'name' => 'block_faq_group',
                    'aria-label' => '',
                    'type' => 'repeater',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'layout' => 'table',
                    'min' => 0,
                    'max' => 0,
                    'collapsed' => '',
                    'button_label' => 'Add Row',
                    'rows_per_page' => 20,
                    'sub_fields' => array(
                        array(
                            'key' => 'field_63e967ee77ac0',
                            'label' => 'Question',
                            'name' => 'block_faq_question',
                            'aria-label' => '',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'maxlength' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'parent_repeater' => 'field_63e9687677ac2',
                        ),
                        array(
                            'key' => 'field_63e9686577ac1',
                            'label' => 'Answer',
                            'name' => 'block_faq_answer',
                            'aria-label' => '',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'maxlength' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'parent_repeater' => 'field_63e9687677ac2',
                        ),
                    ),
                ),
            ),
            'min' => '',
            'max' => '',
        );
    }
    
    public function show() {
        echo 'faq block';
    }
}

