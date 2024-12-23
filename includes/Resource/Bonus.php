<?php

namespace Bankroll\Includes\Resource;

use Bankroll\Includes\Traits\ToArray;
use Bankroll\Includes\View\Components;
use Bankroll\Includes\View\Helpers;
use Carbon\Carbon;
use Bankroll\Includes\Dto\BonusDto;
use Bankroll\Includes\Traits\HasImage;
use Bankroll\Includes\Traits\Link;

class Bonus {
	use HasImage;
	use ToArray;
	use Link;

	public int $id;
	public string $bonus_type;
	public ?int $bonus_for_id;
	public ?string $bonus_for_post_type;
	public string $affiliate_link;
	public ?string $first_line;
	public ?string $second_line;
	public ?string $description;
	public ?string $promo_code;
	public ?int $bonus_value;
	public ?int $free_spins_value;
	public array $image = [];
	public ?Carbon $start_date = null;
	public ?Carbon $end_date = null;

	public function setId( int $id ) {
		$this->id = $id;
	}

	public function setBonusType( string $type ): void {
		$this->bonus_type = $type;
	}

	public function setImage(): void {
		$imageData = get_field('cpt_casino_featured_image', $this->bonus_for_id);
		$this->image = Components::imageData($imageData);
	}

	public function setBonusForId( ?int $id = null ): void {
		if ( ! empty( $id ) ) {
			$this->bonus_for_id = $id;
		} else {
			$this->bonus_for_id = null;
		}
	}

	public function setFirstLine( ?string $first_line = null ): void {
		$this->first_line = $first_line;
	}

	public function setSecondLine( ?string $second_line = null ): void {
		$this->second_line = $second_line;
	}

	public function setBonusValue( ?int $bonus_value = null ): void {
		$this->bonus_value = $bonus_value;
	}

	public function setFreeSpinsValue( ?int $free_spins_value = null ): void {
		$this->free_spins_value = $free_spins_value;
	}

	public function setDescription( ?string $description = null ): void {
		$this->description = $description;
	}

	public function setPromoCode( ?string $promo_code = null ): void {
		$this->promo_code = $promo_code;
	}

	public function setStartDate( string $start_date = null ): void {
		if ( ! empty( $start_date ) ) {
			$this->start_date = Carbon::createFromFormat( 'd/m/Y', $start_date );
		}
	}

	public function setEndDate( string $end_date = null ): void {
		if ( ! empty( $end_date ) ) {
			$this->end_date = Carbon::createFromFormat( 'd/m/Y', $end_date );
		}
	}

	public function setAffiliateLink() {
		$name = $this->generateShortname( get_the_title( $this->bonus_for_id ) );

		$this->affiliate_link = "/visit/{$name}/{$this->bonus_type}";
	}

	private function generateShortname( string $input ) {
		$formatted = preg_replace( '/\s+/', '_', $input );

		$formatted = preg_replace( '/[^A-Za-z0-9_]/', '', $formatted );

		$formatted = strtolower( $formatted );

		return $formatted;
	}

	public function data(): array {
		$dto = null;

		if ( ! empty( $this->id ) ) {
			$image = get_field( 'cpt_casino_featured_image', $this->bonus_for_id );

			$dto = new BonusDto(
				id: $this->id,
				bonus_type: $this->bonus_type,
				first_line: $this->first_line,
				bonus_for_id: $this->bonus_for_id,
				image: Helpers::prepareImageData( $image ),
				affiliate_link: $this->affiliate_link,
				second_line: $this->second_line,
				bonus_value: $this->bonus_value,
				free_spins_value: $this->free_spins_value,
				description: $this->description,
				promo_code: $this->promo_code,
				start_date: $this->start_date?->format( 'd/m/Y' ),
				end_date: $this->end_date?->format( 'd/m/Y' )
			);
		}

		return $dto ? $dto->toArray() : [];
	}
}
