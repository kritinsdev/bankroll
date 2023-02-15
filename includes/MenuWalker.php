<?php

namespace Bankroll\Includes;

class MenuWalker extends \Walker_Nav_Menu
{

    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat($t, $depth);

        // Default class.
        $classes = ['submenu'];


        $class_names = implode(' ', $classes);
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $output .= "{$n}{$indent}<ul$class_names>{$n}";
    }

    public function start_el(&$output, $data_object, $depth = 0, $args = null, $current_object_id = 0)
    {
        $menu_item = $data_object;

        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent  = ($depth) ? str_repeat($t, $depth) : '';
        $classes = empty($menu_item->classes) ? [] : (array)$menu_item->classes;

        $args = apply_filters('nav_menu_item_args', $args, $menu_item, $depth);

        $class_names = implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $menu_item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        $class_names = '';

        if ( ! empty($args->walker->has_children)) {
            $class_names = ' class="has-submenu"';
        }

        $output .= $indent . '<li'. $class_names . '>';

        $atts           = [];
        $atts['title']  = ! empty($menu_item->attr_title) ? $menu_item->attr_title : '';
        $atts['target'] = ! empty($menu_item->target) ? $menu_item->target : '';
        if ('_blank' === $menu_item->target && empty($menu_item->xfn)) {
            $atts['rel'] = 'noopener';
        } else {
            $atts['rel'] = $menu_item->xfn;
        }
        $atts['href']         = ! empty($menu_item->url) ? $menu_item->url : '';
        $atts['aria-current'] = $menu_item->current ? 'page' : '';

        $atts = apply_filters('nav_menu_link_attributes', $atts, $menu_item, $args, $depth);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (is_scalar($value) && '' !== $value && false !== $value) {
                $value      = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters('the_title', $menu_item->title, $menu_item->ID);

        $title = apply_filters('nav_menu_item_title', $title, $menu_item, $args, $depth);

        $item_output = null;
        if ( ! empty($args->before)) {
            $item_output = $args->before;
        }

        if ( ! empty($args->walker->has_children)) {
            $item_output .= '<div class="trigger js-open-submenu"><i class="menu-item-icon fa-solid fa-star"></i><a' . $attributes . '>';
        } else {
            $item_output .= '<a' . $attributes . '>';
        }

        if ( ! empty($args->link_before)) {
            $item_output .= $args->link_before;
        }

        $item_output .= $title;

        if ( ! empty($args->link_after)) {
            $item_output .= $args->link_after;
        }

        if ( ! empty($args->walker->has_children)) {
            $item_output .= '</a><i class="submenu-icon fa-solid fa-angle-down"></i></div>';
        } else {
            $item_output .= '</a>';
        }

        if ( ! empty($args->after)) {
            $item_output .= $args->after;
        }

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $menu_item, $depth, $args);
    }

}
