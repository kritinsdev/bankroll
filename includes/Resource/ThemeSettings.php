<?php

namespace Bankroll\Includes\Resource;

use Bankroll\Includes\View\Components;
use Bankroll\Includes\View\Helpers;

class ThemeSettings {
	public array $logo;
	public string $prefix = 'bankroll';
	public string $color;

	public function __construct() {
		$this->setDefaults();

		return $this;
	}

	private function setDefaults() {
		$this->color = "#ebebf2";

		$this->logo = Helpers::prepareImageData( get_field( "{$this->prefix}_logo", 'option' ) );
	}

	public function getSiteLogo(): array {
		return $this->logo;
	}

	public function getFooterData(): array {
		$imageIds = get_field( 'footer_images', 'option' );
		$images   = [];
		if ( ! empty( $imageIds ) ) {
			foreach ( $imageIds as $image ) {
				$images[] = Helpers::prepareImageData( $image['image'] );
			}
		}

		$data['text']        = get_field( 'footer_text', 'option' );
		$data['images']      = $images;
		$data['navigations'] = $this->prepareFooterMenus();

		return $data;
	}

	private function prepareFooterMenus(): array {
		$locations = [
			'footer_1' => 'First Footer Menu',
			'footer_2' => 'Second Footer Menu',
			'footer_3' => 'Third Footer Menu',
			'footer_4' => 'Fourth Footer Menu',
		];

		$navigations = [];
		foreach ( $locations as $location => $name ) {
			$menu = wp_get_nav_menu_items( get_nav_menu_locations()[ $location ] ?? null );

			if ( $menu ) {
				$menuItems = [];
				foreach ( $menu as $item ) {
					$menuItems[] = [
						'ID'     => $item->ID,
						'title'  => $item->title,
						'url'    => $item->url,
						'target' => $item->target,
						'parent' => $item->menu_item_parent,
					];
				}
				$navigations[ $location ] = $menuItems;
			}
		}

		return $navigations;
	}
}
