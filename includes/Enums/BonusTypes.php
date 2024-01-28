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
}
