<?php

namespace Bankroll\Blocks;

abstract class AbstractBlock implements BlockInterface {
	protected string $viewFolder;
	protected array $preparedData = [];

	public function __construct(
		protected string $blockKey,
	) {
	}

	abstract public function prepareData( array|false $data ): void;

	public function init(): void {
		$this->setFolder();
		$this->enqueue();
		$this->registerAjax();
	}

	public function view(): mixed {
		return
			get_template_part(
				slug: $this->viewFolder,
				args: $this->preparedData,
			);
	}

	public function setFolder(): void {
		$folder           = ucfirst( $this->blockKey );
		$this->viewFolder = "Blocks/Types/$folder/view";
	}

	public function enqueue(): void {
		$jsPath  = BANKROLL_DIR . "/dist/{$this->blockKey}-js.js";
		$cssPath = BANKROLL_DIR . "/dist/{$this->blockKey}-css.css";

		if ( file_exists( $jsPath ) ) {
			wp_enqueue_script(
				"{$this->blockKey}-js",
				BANKROLL_ASSETS_URL . "/{$this->blockKey}-js.js",
				[],
				BANKROLL_VER,
				[
					'strategy'  => 'defer',
					'in_footer' => true,
				]
			);
		}

		if ( file_exists( $cssPath ) ) {
			wp_enqueue_style(
				"{$this->blockKey}-css",
				BANKROLL_ASSETS_URL . "/{$this->blockKey}-css.css",
				[],
				BANKROLL_VER,
			);
		}
	}

	public function registerAjax(): void {
	}
}
