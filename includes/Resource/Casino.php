<?php

namespace Bankroll\Includes\Resource;

use Bankroll\Includes\Enums\BonusType;
use Bankroll\Includes\Factory\BonusFactory;
use Bankroll\Includes\Traits\HasImage;
use Bankroll\Includes\Traits\ToArray;

class Casino {
	use HasImage;
	use ToArray;

	public int $id;
	public string $title;
	public string $permalink;
	public array $image = [];

	public array $ratings = [];
	public array $bonuses = [];
	public array $main_bonus = [];
	public array $payment_methods = [];

	public function __construct() {
		return $this;
	}

	public function setId( int $id ): void {
		$this->id = $id;
	}

	public function setImage( ?int $id = null ) {
		$this->image = $this->getImageData( $id );
	}

	public function setTitle() {
		$this->title = get_the_title( $this->id );
	}

	public function setPermalink() {
		$this->permalink = get_the_permalink( $this->id );
	}

	public function setRatings(): void {
		$keys = [ 'global', 'trust_fairness', 'bonus_offers', 'games', 'payments' ];

		foreach ( $keys as $key ) {
			$this->ratings[ $key ] = get_post_meta( $this->id, "cpt_casino_rating_$key", true );
		}
	}

	public function setBonuses( array $bonus_ids ): void {
		if ( ! empty( $bonus_ids ) ) {
			$existing_bonuses = [];
			foreach ( $bonus_ids as $id ) {
				if ( get_post_status( $id ) ) {
					$existing_bonuses[] = $id;
				}
			}

			foreach ( $existing_bonuses as $id ) {
				$bonus = BonusFactory::create( $id );

				if ( $bonus->bonus_type == BonusType::MainBonus->key() ) {
					$this->setMainBonus( $bonus );
				}

				$this->bonuses[$bonus->bonus_type] = $bonus->data();
			}
		}
	}

	public function getBonuses(): array {
		return $this->bonuses;
	}

	public function setMainBonus( Bonus $bonus ): void {
		$this->main_bonus = $bonus->data();
	}

	public function setPaymentMethods(): void {
	}
}
