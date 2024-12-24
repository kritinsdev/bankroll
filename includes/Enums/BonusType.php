<?php

namespace Bankroll\Includes\Enums;

enum BonusType {
	case MainBonus;
	case WelcomeBonus;
	case FirstDepositBonus;
	case NoDepositBonus;
	case CashbackBonus;
	case FreeSpinsBonus;
	case ReloadBonus;
	case WageringBonus;
	case CustomBonus;

	public function label(): string {
		return match ( $this ) {
			BonusType::MainBonus => 'Main bonus',
			BonusType::WelcomeBonus => 'Welcome bonus',
			BonusType::FirstDepositBonus => 'First deposit bonus',
			BonusType::NoDepositBonus => 'No deposit bonus',
			BonusType::CashbackBonus => 'Cashback bonus',
			BonusType::FreeSpinsBonus => 'Free spins bonus',
			BonusType::ReloadBonus => 'Reload bonus',
			BonusType::WageringBonus => 'Wagering bonus',
			BonusType::CustomBonus => 'Custom bonus',
		};
	}

	public function key(): string {
		return match ( $this ) {
			BonusType::MainBonus => 'main_bonus',
			BonusType::WelcomeBonus => 'welcome_bonus',
			BonusType::FirstDepositBonus => 'first_deposit_bonus',
			BonusType::NoDepositBonus => 'no_deposit_bonus',
			BonusType::CashbackBonus => 'cashback_bonus',
			BonusType::FreeSpinsBonus => 'free_spins_bonus',
			BonusType::ReloadBonus => 'reload_bonus',
			BonusType::WageringBonus => 'wagering_bonus',
			BonusType::CustomBonus => 'custom_bonus',
		};
	}

	public static function fromName( string $key ): string {
		foreach ( self::cases() as $status ) {
			if ( $key === $status->key() ) {
				return $status->label();
			}
		}

		return '';
	}

	public static function populateBonusChoices(): array {
		$choices = [];

		foreach ( self::cases() as $case ) {
			$choices[ $case->key() ] = $case->label();
		}

		return $choices;
	}
}
