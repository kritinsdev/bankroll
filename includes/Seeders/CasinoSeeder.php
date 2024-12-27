<?php

namespace Bankroll\Includes\Seeders;
class CasinoSeeder {
	private const CASINO_DATA = [
		'post_type'    => 'casino',
		'post_status'  => 'publish',
		'post_title'   => 'Demo Casino',
	];

	private const ACF_FIELDS = [
		'cpt_casino_rating_trust_fairness' => 5,
		'cpt_casino_rating_bonus_offers'   => 4.8,
		'cpt_casino_rating_games'          => 4.5,
		'cpt_casino_rating_payments'       => 3.9,
	];

	public static function seed() {
		$post_id = wp_insert_post( self::CASINO_DATA );

		if ( is_wp_error( $post_id ) ) {
			throw new Exception( "Failed to create casino post: " . $post_id->get_error_message() );
		}

		foreach ( self::ACF_FIELDS as $field_name => $value ) {
			update_field( $field_name, $value, $post_id );
		}

		return $post_id;
	}
}