<?php

namespace Bankroll\Includes\View;

class Components {
	public static function imageData(
		?int $id,
		$size = 'bankroll-image'
	): array {
		if ( empty( $id ) ) {
			return [];
		}

		$imageData['src']    = wp_get_attachment_image_src( $id, $size );
		$imageData['srcset'] = wp_get_attachment_image_srcset( $id, $size );
		$imageData['sizes']  = wp_get_attachment_image_sizes( $id, $size );
		$imageData['alt']    = get_post_meta( $id, '_wp_attachment_image_alt', true );

		return $imageData;
	}

	public static function image( int|array $imageData, array $classes = [] ): void {
		if ( is_int( $imageData ) ) {
			$data = self::imageData( $imageData );
		} else {
			$data = $imageData;
		}

		$class = [ 'flex' ];
		if ( ! empty( $classes ) ) {
			$data['class'] = array_merge( $class, $classes );
		}

		Template::get( 'global', 'image', $data );
	}

	public static function icon( string $icon, int $size = 10, string $color = 'text-white' ) {
		Template::get( 'global', 'icon', [
			'icon'  => $icon,
			'size'  => $size,
			'color' => $color,
		] );
	}
}