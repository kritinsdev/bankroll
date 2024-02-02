<?php

namespace Bankroll\Includes\Enums;

enum BonusTypes
{
    case MainBonus;
    case WelcomeBonus;
    case FirstDepositBonus;
    case NoDepositBonus;
    case CashbackBonus;
    case FreeSpinsBonus;
    case ReloadBonus;
    case WageringBonus;
    case CustomBonus;

    public function label(): string
    {
        return match ($this) {
            BonusTypes::MainBonus => 'Main bonus',
            BonusTypes::WelcomeBonus => 'Welcome bonus',
            BonusTypes::FirstDepositBonus => 'First deposit bonus',
            BonusTypes::NoDepositBonus => 'No deposit bonus',
            BonusTypes::CashbackBonus => 'Cashback bonus',
            BonusTypes::FreeSpinsBonus => 'Free spins bonus',
            BonusTypes::ReloadBonus => 'Reload bonus',
            BonusTypes::WageringBonus => 'Wagering bonus',
            BonusTypes::CustomBonus => 'Custom bonus',
        };
    }

    public function key(): string
    {
        return match ($this) {
            BonusTypes::MainBonus => 'main_bonus',
            BonusTypes::WelcomeBonus => 'welcome_bonus',
            BonusTypes::FirstDepositBonus => 'first_deposit_bonus',
            BonusTypes::NoDepositBonus => 'no_deposit_bonus',
            BonusTypes::CashbackBonus => 'cashback_bonus',
            BonusTypes::FreeSpinsBonus => 'free_spins_bonus',
            BonusTypes::ReloadBonus => 'reload_bonus',
            BonusTypes::WageringBonus => 'wagering_bonus',
            BonusTypes::CustomBonus => 'custom_bonus',
        };
    }
}
