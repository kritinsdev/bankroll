<?php

namespace Bankroll\Includes\Enums;

enum BonusTypes: string
{
    case MainBonus = 'Main Bonus';
    case WelcomeBonus = 'Welcome Bonus';
    case FirstDepositBonus = 'First Deposit Bonus';
    case NoDepositBonus = 'No Deposit Bonus';
    case CashbackBonus = 'Cashback Bonus';
    case FreeSpinsBonus = 'Free Spins Bonus';
    case ReloadBonus = 'Reload Bonus';
    case WageringBonus = 'Wagering Bonus';
    case CustomBonus = 'Custom Bonus';
}
