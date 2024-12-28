<?php

namespace Bankroll\Includes\Resource;

use Bankroll\Includes\Traits\HasImage;
use Bankroll\Includes\Traits\ToArray;

class Payment {
	use HasImage;
	use ToArray;

	public int $id;
	public string $title;
	public array $image;

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
}