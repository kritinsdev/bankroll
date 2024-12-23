<?php

namespace Bankroll\Includes\Setup;

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

		$classes = ['submenu absolute bg-red-500 shadow-lg rounded-md py-2'];

		$class_names = implode(' ', $classes);
		$class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

		$output .= "{$n}{$indent}<ul$class_names x-show=\"open\" 
            x-transition:enter=\"transition ease-out duration-200\"
            x-transition:enter-start=\"opacity-0 transform scale-95\"
            x-transition:enter-end=\"opacity-100 transform scale-100\"
            x-transition:leave=\"transition ease-in duration-150\"
            x-transition:leave-start=\"opacity-100 transform scale-100\"
            x-transition:leave-end=\"opacity-0 transform scale-95\"
            @click.away=\"open = false\"
            style=\"display: none;\">{$n}";
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
		$indent = ($depth) ? str_repeat($t, $depth) : '';
		$classes = empty($menu_item->classes) ? [] : (array)$menu_item->classes;

		$args = apply_filters('nav_menu_item_args', $args, $menu_item, $depth);

		$class_names = implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $menu_item, $args, $depth));

		if (!empty($args->walker->has_children)) {
			$class_names = ' class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false"';
		}

		$output .= $indent . '<li ' . $class_names . '>';

		$atts = [];
		$atts['title'] = !empty($menu_item->attr_title) ? $menu_item->attr_title : '';
		$atts['target'] = !empty($menu_item->target) ? $menu_item->target : '';
		if ('_blank' === $menu_item->target && empty($menu_item->xfn)) {
			$atts['rel'] = 'noopener';
		} else {
			$atts['rel'] = $menu_item->xfn;
		}
		$atts['href'] = !empty($menu_item->url) ? $menu_item->url : '';
		$atts['aria-current'] = $menu_item->current ? 'page' : '';

		$atts['class'] = 'flex';

		$atts = apply_filters('nav_menu_link_attributes', $atts, $menu_item, $args, $depth);

		$attributes = '';
		foreach ($atts as $attr => $value) {
			if (is_scalar($value) && '' !== $value && false !== $value) {
				$value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$title = apply_filters('the_title', $menu_item->title, $menu_item->ID);
		$title = apply_filters('nav_menu_item_title', $title, $menu_item, $args, $depth);

		$item_output = $args->before ?? '';

		if (!empty($args->walker->has_children)) {
			$item_output .= '<div class="flex items-center gap-1">';
			$item_output .= '<a' . $attributes . '>';
		} else {
			$item_output .= '<a' . $attributes . '>';
		}

		$item_output .= ($args->link_before ?? '') . $title . ($args->link_after ?? '');

		if (!empty($args->walker->has_children)) {
			$item_output .= '</a>';
			$item_output .= '<span class="icon-[material-symbols--keyboard-arrow-down] transition-transform duration-200" :class="{\'rotate-180\': open}"></span>';
			$item_output .= '</div>';
		} else {
			$item_output .= '</a>';
		}

		$item_output .= $args->after ?? '';

		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $menu_item, $depth, $args);
	}
}